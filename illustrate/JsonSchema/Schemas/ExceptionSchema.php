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

namespace illustrate\JsonSchema\Schemas;

use illustrate\JsonSchema\ValidationContext;
use illustrate\JsonSchema\Info\SchemaInfo;
use illustrate\JsonSchema\Errors\ValidationError;
use illustrate\JsonSchema\Exceptions\SchemaException;

final class ExceptionSchema extends AbstractSchema
{

    private SchemaException $exception;

    /**
     * @param SchemaInfo $info
     * @param SchemaException $exception
     */
    public function __construct(SchemaInfo $info, SchemaException $exception)
    {
        parent::__construct($info);
        $this->exception = $exception;
    }

    /**
     * @inheritDoc
     * @throws SchemaException
     */
    public function validate(ValidationContext $context): ?ValidationError
    {
        throw $this->exception;
    }
}