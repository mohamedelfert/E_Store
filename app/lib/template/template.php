<?php

namespace PHPMVC\LIB\Template;

class Template 
{
    use TemplateHelper;

    private $_templateParts;
    private $_action_view;
    private $_data;
    private $_registry;

    public function swapTemplate($template){
        $this->_templateParts['template'] = $template;
    }

    public function __get($name)
    {
        return $this->_registry->$name;
    }

    public function __construct(array $parts)
    {
        $this->_templateParts = $parts;
    }

    public function setActionViewFile($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }

    public function setAppData($data)
    {
        $this->_data = $data;
    }

    public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }

    private function renderTemplateHeaderStart()
    {
        extract($this->_data);
        require TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd()
    {
        extract($this->_data);
        require TEMPLATE_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter()
    {
        extract($this->_data);
        require TEMPLATE_PATH . 'templatefooter.php';
    }

    private function renderTemplateBlocks()
    {
        if(!array_key_exists('template',$this->_templateParts)){
            //trigger_error("Sorry You Have To Define The Template Blocks",E_USER_WARNING);
            echo '
                    <div style="background: #ce5656;padding: 5px;text-align: center">
                        <h1> Sorry You Have To Define The Template Blocks :( </h1>
                    </div>
                ';
        }else{
            extract($this->_data);
            $parts = $this->_templateParts['template'];
            if(!empty($parts)){
                foreach($parts as $partKey => $file){
                    if($partKey === ':view'){
                        require $this->_action_view;
                    }else{
                        require $file;
                    }
                }
            }
        }
    }

    private function renderHeaderResources()
    {
        $output = '';
        if(!array_key_exists('header_resources',$this->_templateParts)){
            //trigger_error("Sorry You Have To Define The Header Resources",E_USER_WARNING);
            echo '
                    <div style="background: #ce5656;padding: 5px;text-align: center">
                        <h1> Sorry You Have To Define The Header Resources :( </h1>
                    </div>
                ';
        }else{
            $resources = $this->_templateParts['header_resources'];
            //Generate Css Files
            $css = $resources['css'];
            if(!empty($css)){
                foreach($css as $cssKey => $path){
                    $output .= '<link type="text/css" rel="stylesheet" href="' . $path . '">';
                }
            }
            //Generate Js Files
            $js = $resources['js'];
            if(!empty($js)){
                foreach($js as $jsKey => $path){
                    $output .= '<script  src="' . $path . '"></script>';
                }
            }
        }
        echo $output;
    }

    private function renderFooterResources()
    {
        $output = '';
        if(!array_key_exists('footer_resources',$this->_templateParts)){
            //trigger_error("Sorry You Have To Define The Footer Resources",E_USER_WARNING);
            echo '
                    <div style="background: #ce5656;padding: 5px;text-align: center">
                        <h1> Sorry You Have To Define The Footer Resources :( </h1>
                    </div>
                ';
        }else{
            $resources = $this->_templateParts['footer_resources'];
            if(!empty($resources)){
                foreach($resources as $resourcesKey => $path){
                    $output .= '<script  src="' . $path . '"></script>';
                }
            }
        }
        echo $output;
    }

    public function renderApp()
    {
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }
}