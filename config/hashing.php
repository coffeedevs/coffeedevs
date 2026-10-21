<?php
return ['driver'=>'bcrypt', 'bcrypt'=>['rounds'=>(int) env('BCRYPT_ROUNDS',10),'verify'=>true], 'rehash_on_login'=>false];
