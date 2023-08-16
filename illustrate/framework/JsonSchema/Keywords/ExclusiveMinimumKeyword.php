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

namespace illustrate\JsonSchema\Keywords;

use illustrate\JsonSchema\{ValidationContext, Keyword, Schema};
use illustrate\JsonSchema\Errors\ValidationError;

class ExclusiveMinimumKeyword implements Keyword
{
    use ErrorTrait;

    protected float $number;

    /**
     * @param float $number
     */
    public function __construct(float $number)
    {
        $this->number = $number;
    }

    /**
     * @inheritDoc
     */
    public function validate(ValidationContext $context, Schema $schema): ?ValidationError
    {
        if ($context->currentData() > $this->number) {
            return null;
        }

        return $this->error($schema, $context, 'exclusiveMinimum', "Number must be greater than {min}", [
            'min' => $this->number,
        ]);
    }
}