<?php

class GenerateAuthCommand extends CConsoleCommand {

    public function run($args) {
        // delete old auth file if it exists (IF USING PHP AUTH)
        @unlink('../data/auth.php');
        $auth = Yii::app()->authManager;
        $role = $auth->createRole("admin");
        $role = $auth->createRole("normal");
        $auth->save();
        print "evviva";
        //TODO: aggiungere assegnazioni ruolo-utente
    }

    public function getHelp() {
        return 'Usage: how to use this command';
    }

}