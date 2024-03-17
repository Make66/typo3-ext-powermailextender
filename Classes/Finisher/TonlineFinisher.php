<?php
namespace Taketool\Powermailextender\Finisher;

use In2code\Powermail\Domain\Model\Mail;
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
     * @var Mail
     */
    protected $mail;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var array
     */
    protected $settings;

    /* *
     * Will be called always at first
     *
     * @return void
     */
    /*
    public function initializeFinisher()
    {
    }
    */

    /* *
     * Will be called before myFinisher()
     *
     * @return void
     */
    /*
    public function initializeMyFinisher()
    {
    }
    */

    /**
     * MyFinisher
     *
     * @return void
     */
    public function TonlineFinisher()
    {
        // get value from configuration
        //$foo = $this->configuration['foo'];
        //debug($this->configuration, 'Powermail T-OnlineFinisher: $this->configuration');

        // get data from mail
        /*
        debug([
            'uidMail' => $this->getMail()->getUid(),
            'pidStore' => $this->getMail()->getPid(),
            'senderMail' => $this->getMail()->getSenderMail(), // mkeller.da@t-online.de
            'senderName' => $this->getMail()->getSenderName(),
            'receiverMail' => $this->getMail()->getReceiverMail(),
            'subject' => $this->getMail()->getSubject(),
            'body' => trim($this->getMail()->getBody()),

        ], 'Powermail T-OnlineFinisher: $this->mail Data');
        */
        //debug($this->mail, 'Powermail T-OnlineFinisher: $this->mail');

        // do some more magic ... t-online.de
        $senderMail = $this->getMail()->getSenderMail();
        if (strpos($senderMail, '@t-online.de') >0)
        {
            // send mail to receiver failed before and will be done here again
            $mailSuccess = MailUtility::sendPlainMail(
                $receiverMail = $this->getMail()->getReceiverMail(),
                $senderMail = $this->getMail()->getReceiverMail(),  // yes that's right! Receiver gets mail only once...
                $subject = $this->getMail()->getSubject(),
                $body = "Sie haben eine neuen Eintrag von einer T-Online Adresse \n"
                    .$this->getMail()->getSenderName()
                    .'<'.$this->getMail()->getSenderMail().">\n"
                    ."in Ihrem Powermail Ordner mit der SeitenID=".$this->getMail()->getPid().'.'
            );
            if ($mailSuccess)
            {
                //debug($mailSuccess,'Mail successful sent');
            } else {
                //debug($mailSuccess,'Mail not successful sent');
            }
        }
    }
}