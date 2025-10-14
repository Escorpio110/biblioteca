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
            /**$limit = RESULTS_PER_PAGE;
            $total = Socio::total();**/
            $temas = Tema::all();

            /**$paginator = new Paginator('/Socio/list', $page, $limit, $total);

            $libros = V_libro::orderBy('titulo', 'ASC', $limit, $paginator->getOffset());**/


            
            
            return view('tema/list', ['temas'=>$temas/**,'paginator'=>$paginator**/]);
        }
        /**
         * @param int $id
         * @return ViewResponse
         */
        public function show(int $dni = 0){
            
            $socio = Socio::findOrFail($dni, 'No s\'ha trobat el llibre indicat.');

            
           

            return view('socio/show', ['socio'=>$socio]);
        }
    }