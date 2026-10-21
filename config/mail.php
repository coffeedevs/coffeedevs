<?php
return [
 'default'=>env('MAIL_MAILER',env('MAIL_DRIVER','smtp')),
 'mailers'=>[
  'smtp'=>['transport'=>'smtp','host'=>env('MAIL_HOST','smtp.mailgun.org'),'port'=>env('MAIL_PORT',587),'scheme'=>env('MAIL_SCHEME',env('MAIL_ENCRYPTION','tls')==='ssl'?'smtps':'smtp'),'require_tls'=>env('MAIL_ENCRYPTION','tls')==='tls','auto_tls'=>env('MAIL_ENCRYPTION','tls')!==null,'username'=>env('MAIL_USERNAME'),'password'=>env('MAIL_PASSWORD')],
  'sparkpost'=>['transport'=>'sparkpost'],
  'log'=>['transport'=>'log'], 'array'=>['transport'=>'array'],
  'sendmail'=>['transport'=>'sendmail','path'=>env('MAIL_SENDMAIL_PATH','/usr/sbin/sendmail -bs')],
 ],
 'from'=>['address'=>env('MAIL_FROM_ADDRESS','contacto@coffeedevs.com'),'name'=>env('MAIL_FROM_NAME','Coffeedevs')],
];
