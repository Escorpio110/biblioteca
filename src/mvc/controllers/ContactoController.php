<?php

    class ContactoController extends Controller{
        /**
         * @return ViewResponse
         */
        public function index(){
            return view('contacto');
        }
        /**
         * @return RedirectResponse
         */
        public function send(){
            if (empty(request()->post('enviar'))) {
                throw new FormException("No se a recivido el formulario");
                
            }
            $from       =request()->post('email');
            $name       =request()->post('nombre');
            $subject    =request()->post('asunto');
            $message    =request()->post('mensaje');

            try {
                $email = new Email(ADMIN_EMAIL, $from, $name, $subject, $message);
                $email -> send();

                Session::success("Mensaje enviado");
                return redirect('/');

            } catch (EmailException $e) {
                Session::error("No se envio");

                if (DEBUG) {
                    throw new Exception($e->getMessage());
                    
                }
                return redirect("/Contacto");

            }

        }
    }