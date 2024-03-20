<?php
namespace Taketool\Powermailextender\Finisher;

use In2code\Powermail\Utility\MailUtility;
use In2code\Powermail\Finisher\AbstractFinisher;

/**
 * Class TonlineFinisher
 *
 * @package Taketool\Ext\Powermailextender
 */
class TonlineFinisher extends AbstractFinisher
{
    /**
     * MyFinisher
     *
     * @return void
     */
    public function TonlineFinisher()
    {
        $senderMail = $this->getMail()->getSenderMail();
        if (strpos($senderMail, '@t-online.de') >0)
        {
            // send mail to receiver failed before and will be done here again
            MailUtility::sendPlainMail(
                $this->getMail()->getReceiverMail(),
                $this->getMail()->getReceiverMail(),
                $this->getMail()->getSubject(),
                "Sie haben eine neuen Eintrag von einer T-Online Adresse \n"
                    .$this->getMail()->getSenderName()
                    .'<'.$this->getMail()->getSenderMail().">\n"
                    .'in Ihrem Powermail Ordner.'
            );
        }
    }
}