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

use pocketmine\plugin\Plugin;

final class PMServerUI{

	private function __construct(){}

	private static ?Plugin $plugin = null;
	private static \PrefixedLogger $logger;
	private static UIManager $uiManager;
	public static bool $tl = false;

	public static function register(Plugin $plugin, bool $tl = false): void{
		if(self::$plugin instanceof Plugin){
			throw new \InvalidArgumentException("{$plugin->getName()} tries to register PMServerUI that has been registered by " . self::$plugin->getName());
		}

		self::$plugin = $plugin;
		self::$logger = new \PrefixedLogger($plugin->getLogger(), "PMServerUI");
		self::$uiManager = new UIManager($plugin);

		//TODO: make options easier to configure.
		self::$tl = $tl;
		//crash on unhandled error.
		//kick player sending malformed response.
		//validate response length before performing json_decode.
		//button image fix.
		//fix kick disconnect screen.
		//disable player input.
		//enforce string dropdown.

		if(__NAMESPACE__ === "DavyCraft648\\PMServerUI"){
			self::getLogger()->notice("It is recommended to shade virions, go to https://poggit.pmmp.io/virion to see virion documentation.");
		}
	}

	public static function getPlugin(): Plugin{
		return self::$plugin ?? throw new \LogicException("PMServerUI has not been registered");
	}

	public static function getLogger(): \PrefixedLogger{
		return self::$logger ?? throw new \LogicException("PMServerUI has not been registered");
	}

	public static function getUIManager(): UIManager{
		return self::$uiManager ?? throw new \LogicException("PMServerUI has not been registered");
	}
}