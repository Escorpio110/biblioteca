<?php
    /**
     * @author Robert Sallent 
     */
    class SocioController extends Controller{
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

            $filtro = Filter::apply('socio');

            $limit = RESULTS_PER_PAGE;

            if($filtro) {

                $total = Socio::filteredResults($filtro);

                $paginator = new Paginator('/Socio/list', $page, $limit, $total);

                $socios = Socio::filter($filtro, $limit, $paginator->getOffset());  

            } else {

                $total = Socio::total();

                $paginator = new Paginator('/Socio/list', $page, $limit, $total);

                $socios = Socio::orderBy('nombre', 'ASC', $limit, $paginator->getOffset());
                
            }
                    
            return view('socio/list', ['socios'=>$socios,'paginator'=>$paginator, 'filro' =>$filtro]);
        }
        /**
         * @param int $id
         * @return ViewResponse
         */
        public function show(int $id = 0){
            
            $socio = Socio::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            
           

            return view('socio/show', ['socio'=>$socio]);
        }
        /**
         * Muestra el formulario para editar un libro.
         * 
         * @return ViewResponse
         */
        public function create(){

            return view('Socio/create', ['listaTemas'=> Tema::orderBy('tema')]);
        }
    }