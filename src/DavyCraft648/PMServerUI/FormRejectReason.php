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

enum FormRejectReason{
	case MalformedResponse;
	case PlayerQuit;
	case ServerShutdown;
}