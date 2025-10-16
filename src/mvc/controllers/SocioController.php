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
            $limit = RESULTS_PER_PAGE;
            $total = Socio::total();
            #$socios = Socio::all();
                
            $paginator = new Paginator('/Socio/list', $page, $limit, $total);

            $socios = Socio::orderBy('nombre', 'ASC', $limit, $paginator->getOffset());


            
            
            return view('socio/list', ['socios'=>$socios,'paginator'=>$paginator]);
        }
        /**
         * @param int $id
         * @return ViewResponse
         */
        public function show(int $id = 0){
            
            $socio = Socio::findOrFail($id, 'No s\'ha trobat el llibre indicat.');

            
           

            return view('socio/show', ['socio'=>$socio]);
        }
    }