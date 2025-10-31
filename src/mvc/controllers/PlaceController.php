<?php
    /**
     * @author Robert Sallent 
     */
    class PlaceController extends Controller{
        /**
         * Muestra la lista de libros.
         * 
         * @return ViewResponse
         */
        public function index(){
            
            return $this->list();
        }

        /**
         * Muestra el formulario para crear un nuevo libro.
         * 
         * @return ViewResponse
         */
        public function list(int $page = 1){
            $places=Place::all();

            //$ejemplares = Ejemplar::all();
            
            
            return view('place/list', [
                'places'        =>$places 
                //'ejemplares'    =>$ejemplares, 
                ]);
        }
        
        /**
         * @param int $id
         * @return ViewResponse
         */
        public function show(int $id = 0){
            
            $libro = Libro::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            $ejemplares = $libro->hasMany('Ejemplar');
            
            $temas = $libro->belongsToMany('Tema', 'temas_libros');

            return view('libro/show', ['libro'=>$libro, 'ejemplares'=>$ejemplares, 'temas'=>$temas]);
        }
        
        /**
         * Muestra el formulario para editar un libro.
         * 
         * @return ViewResponse
         */
        public function create(){

            return view('libro/create', ['listaTemas'=> Tema::orderBy('tema')]);
        }

        public function store(){

            if(!request()->has('guardar')){

                throw new FormException('No s\'han rebut dades del formulari.');
            }try {
                $libro = Libro::create(request()->posts());
                Session::success('Llibre creat correctament.');
                return redirect('/Libro/show/'.$libro->id);
            } catch (SQLException $e){
                
                $mensaje="No s'ha pogut crear el llibre.";
                
                if (str_contains($e->errorMessage(), 'Duplicate entry')) {
                    $mensaje .="<br>Yaexiste un libro con ese <b>ISBN</b>.";
                }
                Session::error($mensaje);

                if(DEBUG){
                    throw new SQLException($e->getMessage());
                }

                return redirect('/Libro/create');
                
            }   

            

            
            
            
        }

        /**
         * Muestra el formulario para editar un libro.
         * 
         * @param int $id
         * @return ViewResponse
         */
        public function edit(int $id = 0){
            
            $libro = Libro::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            $ejemplares = $libro->hasMany('Ejemplar');

            $temas = $libro->belongsToMany('Tema', 'temas_libros');

            $listaTemas = Tema::orderBy('tema');

            return view('libro/edit', [
                'libro'=>$libro, 
                'ejemplares'=>$ejemplares,
                'temas' => $temas,
                'listaTemas'=> $listaTemas]);
        }   

        public function update(){
            if(!request()->has('Actualizar')){

                throw new FormException('No s\'han rebut dades del formulari.');
            }   
            $id = intval(request()->post('id'));
            $libro = Libro::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            $libro->isbn                = request()->post('isbn');
            $libro->titulo              = request()->post('titulo');
            $libro->editorial           = request()->post('editorial');
            $libro->autor               = request()->post('autor');
            $libro->idioma              = request()->post('idioma');
            $libro->edicion             = request()->post('edicion');
            $libro->anyo                = request()->post('anyo');
            $libro->edadrecomendada     = request()->post('edadrecomendada');
            $libro->paginas             = request()->post('paginas');
            $libro->caracteristicas     = request()->post('caracteristicas');
            $libro->sinopsis            = request()->post('sinopsis');

            try{
                $libro->update();
                Session::success('Llibre actualitzat correctament.');
                return redirect("/Libro/edit/$id");

            }catch(SQLException $e){
                Session::error("No s'ha pogut actualitzar el llibre.");

                if(DEBUG){
                    throw new SQLException($e->getMessage());
                }

                return redirect("/Libro/edit/$id");
            }

            /**
             * @param int $id
             * @return ViewResponse
             * 
             */
        }
        public function delete(int $id = 0){
            $libro = Libro::findOrFail($id, 'No s\'ha trobat el llibre indicat.');
            
            

            return view("libro/delete", ['libro'=>$libro]);

        }

        public function destroy(){
            if(!request()->has('borrar')){

                throw new FormException('No s\'han rebut dades del formulari.');
            }   
            $id = intval(request()->post('id'));
            $libro = Libro::findOrFail($id);

            try{
                $libro->deleteObject();
                Session::success('Llibre eliminat correctament.');
                return redirect("/Libro/list");

            }catch(SQLException $e){
                Session::error("No s'ha pogut eliminar el llibre.");

                if(DEBUG){
                    throw new SQLException($e->getMessage());
                }

                return redirect("/Libro/delete/$id");
            }
        }

        public function jsonimport(){
            Auth::oneRole(['ROLE_LIBRARIAN', 'ROLE_ADMIN']);
        
            if (!Upload::arrive('fichero')) {
                
            }
        }

        
    }
