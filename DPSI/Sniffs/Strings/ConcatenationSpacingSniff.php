<?php
/**
 * DPSI_Sniffs_Strings_ConcatenationSpacingSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@DPSI.net>
 * @author    Marc McIntyre <mmcintyre@DPSI.net>
 * @copyright 2006-2011 DPSI Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.DPSI.net/developer/tools/php_cs/licence BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * DPSI_Sniffs_Strings_ConcatenationSpacingSniff.
 *
 * Makes sure there are no spaces between the concatenation operator (.) and
 * the strings being concatenated.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@DPSI.net>
 * @author    Marc McIntyre <mmcintyre@DPSI.net>
 * @copyright 2006-2011 DPSI Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.DPSI.net/developer/tools/php_cs/licence BSD Licence
 * @version   Release: 1.3.5
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class DPSI_Sniffs_Strings_ConcatenationSpacingSniff implements PHP_CodeSniffer_Sniff
{


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_STRING_CONCAT);

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the
     *                                        stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[($stackPtr - 1)]['code'] === T_WHITESPACE
            || $tokens[($stackPtr + 1)]['code'] === T_WHITESPACE
        ) {
            return;
        }
        $message = "L'opérateur de concaténation doit être entouré d'espaces";
        $phpcsFile->addError($message, $stackPtr, 'Missing');

    }//end process()


}//end class

?>
