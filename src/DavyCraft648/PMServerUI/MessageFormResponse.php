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

use pocketmine\form\FormValidationException;

/**
 * Returns data about the player results from a modal message form.
 */
readonly class MessageFormResponse extends FormResponse{

	/**
	 * @param int|null $selection Returns the index of the button that was pushed.
	 */
	public function __construct(?FormCancelationReason $cancelationReason, bool $canceled, public ?int $selection){
		parent::__construct($cancelationReason, $canceled);
	}

	public static function validate(string $rawData): int{
		if($rawData === "true" || $rawData === "false"){
			return $rawData === "true" ? 0 : 1;
		}
		throw new FormValidationException("Expected bool, got $rawData");
	}
}