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

            $filtro = Filter::apply('tema');

            $limit = RESULTS_PER_PAGE;



            
            if($filtro) {

                $total = Tema::filteredResults($filtro);

                $paginator = new Paginator('/Tema/list', $page, $limit, $total);

                $temas = Tema::filter($filtro, $limit, $paginator->getOffset());  

            } else {

                $total = Tema::total();

                $paginator = new Paginator('/Tema/list', $page, $limit, $total);

                $temas = Tema::orderBy('tema', 'ASC', $limit, $paginator->getOffset());
            }
            return view('tema/list', ['temas'=>$temas,'paginator'=>$paginator, 'filtro' => $filtro]);
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

        /**
         * Muestra el formulario para editar un libro.
         * 
         * @return ViewResponse
         */
        public function create(){

            return view('tema/create', ['listaTemas'=> Tema::orderBy('tema')]);
        }
    }
