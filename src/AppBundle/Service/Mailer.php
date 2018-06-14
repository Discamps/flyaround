<?php
/**
 * Created by PhpStorm.
 * User: discamps
 * Date: 14/06/18
 * Time: 20:50
 */

namespace AppBundle\Service;

/**
 * Class Mailer
 * @package AppBundle\Service
 */

class Mailer
{
    protected $mailer;
    protected $templating;
    private $from = 'reservatiion@flyaround.com';

    /**
     * Mailer constructor
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $templating
     *
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating )
    {
        $this->mailer = $mailer;
        $this->templating = $templating;

    }

    /**
     * @param $to
     * @param $type
     *
     */
    public function sendMail($to, $type)
    {
        switch($type){
            case 'Notification':
                // pilot
                $message = (new \Swift_Message('Réservation Flyaround'))
                    ->setFrom($this->from)
                    ->setTo($to)
                    ->setBody($this->templating->render('email/notification.html.twig'), 'text/html');
                $this->mailer->send($message);
                break;

            case 'Confirmation' :
                // pasenger
                $message = (new \Swift_Message('Réservation Flyaround'))
                    ->setFrom($this->from)
                    ->setTo($to)
                    ->setBody($this->templating->render('email/confirmation.html.twig'), 'text/html');
                $this->mailer->send($message);
                break;
        }
    }
}