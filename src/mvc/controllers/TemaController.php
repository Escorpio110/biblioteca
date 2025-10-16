<?php
    /**
     * @author Robert Sallent 
     */
    class TemaController extends Controller{
        /**
         * Muestra la lista de Socio.
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
            $limit = RESULTS_PER_PAGE;
            $total = Tema::total();
            #$temas = Tema::all();

            $paginator = new Paginator('/Tema/list', $page, $limit, $total);

            $temas = Tema::orderBy('Tema', 'ASC', $limit, $paginator->getOffset());


            
            
            return view('tema/list', ['temas'=>$temas,'paginator'=>$paginator]);
        }

        /**
         * @param int $id
         * @return ViewResponse
         */
        public function show(int $id = 0){
            
            $tema = Tema::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            $libros = $tema->belongsToMany('Libro', 'temas_libros');
           

            return view('tema/show', ['tema'=>$tema, 'libros'=>$libros]);
        }
    }