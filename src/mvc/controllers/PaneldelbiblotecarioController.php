<?php
    /**
     * @author Robert Sallent 
     */
    class PaneldelbiblotecarioController extends Controller{
        /**
         * Muestra la lista de Socio.
         * 
         * @return ViewResponse
         */
        public function index(){
            
            return $this->list();
        }
        public function list(int $page = 1){
            $socios = Socio::all();

            /**$paginator = new Paginator('/Socio/list', $page, $limit, $total);

            $libros = V_libro::orderBy('titulo', 'ASC', $limit, $paginator->getOffset());**/


            
            
            return view('socio/list', ['socios'=>$socios/**,'paginator'=>$paginator**/]);
        }

    }