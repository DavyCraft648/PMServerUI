<?php

/*
 * PMServerUI
 * https://github.com/DavyCraft648/PMServerUI
 *
 * Copyright (c) 2025 DavyCraft648
 *
 * Licensed under the MIT License.
 * See LICENSE file in the project root for details.
 */

declare(strict_types=1);

namespace DavyCraft648\PMServerUI;

class FormRejectError extends \Error{

	private function __construct(public FormRejectReason $reason, string $message = "", int $code = 0, ?\Throwable $previous = null){
		parent::__construct($message, $code, $previous);
	}

	public static function create(FormRejectReason $reason, string $message = 'Form rejected', int $code = 0, ?\Throwable $previous = null): static{
		return new static($reason, $message, $code, $previous);
	}
}