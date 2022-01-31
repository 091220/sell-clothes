<?php 

namespace  Infrastructure\Libraries;

use App\Models\User;

class Mail
{
    private $sender_name;

    public static function processMail($arrParams)
    {
        \Mail::send($arrParams['body'], ['options' => @$arrParams['data']], function ($message) use ($arrParams) {
            $message->to($arrParams['email'])
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->subject($arrParams['subject']);

            if (@$arrParams['listFile']) {
                foreach ($arrParams['listFile'] as $item) {
                    $message->attach($item);
                }
            }
        });
    }
}
