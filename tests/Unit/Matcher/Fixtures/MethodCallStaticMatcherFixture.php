<?php
declare(strict_types = 1);
namespace TYPO3\CMS\Scanner\Tests\Unit\Matcher\Fixtures;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Fixture file
 */
class MethodCallStaticMatcherFixture
{
    public function aMethod()
    {
        // Matches
        BackendUtility::getAjaxUrl();
        // Match: getAjaxUrl() is called statitally here and 1 mandatory argument is given
        $foo::getAjaxUrl('bar');

        // No match
        $foo->getAjaxUrl();
        // No match: Dynamycally called even if argument is given
        $foo->getAjaxUrl('bar');
        // @extensionScannerIgnoreLine
        $foo::getAjaxUrl('bar');
    }
}
