<?php
        class EjemplarController extends Controller{
            /**
             * @return ViewResponse
             */
            public function create(int $idlibro =0){

                $libro = Libro::findOrFail($idlibro);

                return view('ejemplar/create', [
                    'libro' => $libro
                ]);
            }
            public function store(){

                if(!request()->has('guardar')){

                    throw new FormException('No s\'han rebut dades del formulari.');
                }   

                $ejemplar = new Ejemplar();


                $ejemplar->idlibro          =intval(request()->post('idlibro'));
                $ejemplar->anyo             = intval(request()->post('anyo'));
                $ejemplar->precio           = floatval(request()->post('precio'));
                $ejemplar->estado           = request()->post('estado');
                
                try {
                    $ejemplar->save();
                    
                    Session::success('Ejemplo creado correctamente.');
                    return redirect('/Libro/edit/'.$ejemplar->idlibro);

                } catch (SQLException $e){
                    Session::error("No s'ha pogut crear el llibre.");

                    if(DEBUG){
                        throw new SQLException($e->getMessage());
                    }

                    return redirect("/Ejemplar/create/$ejemplar->idlibro");
                    
                }
                
            }

        }