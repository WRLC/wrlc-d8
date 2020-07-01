<?php

/*
 * JS renderer for Kint
 * Copyright (C) 2016 Jonathan Vollebregt
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use Kint\Kint;
use Kint\Renderer\JsRenderer;
use Kint\Utils;

if (!\class_exists('Kint\\Renderer\\JsRenderer', true)) {
    require_once __DIR__.'/src/JsRenderer.php';
}

Utils::composerSkipFlags();

if (!\defined('KINT_SKIP_HELPERS') || !KINT_SKIP_HELPERS) {
    require_once __DIR__.'/init_helpers.php';
}

Kint::$renderers[JsRenderer::RENDER_MODE] = 'Kint\\Renderer\\JsRenderer';
