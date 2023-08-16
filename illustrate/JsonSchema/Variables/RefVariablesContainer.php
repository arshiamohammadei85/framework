<?php
/* ============================================================================
 * Copyright 2020 Zindex Software
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace illustrate\JsonSchema\Variables;

use illustrate\JsonSchema\JsonPointer;
use illustrate\JsonSchema\Variables;

final class RefVariablesContainer implements Variables
{

    private JsonPointer $pointer;

    private ?Variables $each;

    private bool $hasDefault;

    /** @var mixed */
    private $defaultValue;

    /**
     * @param JsonPointer $pointer
     * @param Variables|null $each
     * @param mixed $default
     */
    public function __construct(JsonPointer $pointer, ?Variables $each = null, $default = null)
    {
        $this->pointer = $pointer;
        $this->each = $each;
        $this->hasDefault = func_num_args() === 3;
        $this->defaultValue = $default;
    }

    /**
     * @return JsonPointer
     */
    public function pointer(): JsonPointer
    {
        return $this->pointer;
    }

    /**
     * @return null|Variables
     */
    public function each(): ?Variables
    {
        return $this->each;
    }

    /**
     * @return bool
     */
    public function hasDefaultValue(): bool
    {
        return $this->hasDefault;
    }

    /**
     * @return mixed|null
     */
    public function defaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @inheritDoc
     */
    public function resolve($data, array $path = [])
    {
        $resolved = $this->pointer->data($data, $path, $this);
        if ($resolved === $this) {
            return $this->defaultValue;
        }

        if ($this->each && (is_array($resolved) || is_object($resolved))) {
            $path = $this->pointer->absolutePath($path);
            foreach ($resolved as $key => &$value) {
                $path[] = $key;
                $value = $this->each->resolve($data, $path);
                array_pop($path);
                unset($value);
            }
        }

        return $resolved;
    }
}