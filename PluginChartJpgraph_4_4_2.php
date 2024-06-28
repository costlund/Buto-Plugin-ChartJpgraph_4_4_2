<?php
class PluginChartJpgraph_4_4_2{
  function __construct() {
    wfPlugin::includeonce('wf/yml');
    require_once (__DIR__.'/lib/src/jpgraph.php');
    require_once (__DIR__.'/lib/src/jpgraph_bar.php');
    require_once (__DIR__.'/lib/src/jpgraph_line.php');
  }
  public function get_graph($data){
    $data = new PluginWfArray($data);
    /**
     * Graph
     */
    $graph = new Graph($data->get('aWidth') ,$data->get('aHeight'), $data->get('aCachedName'));
    $graph->SetScale($data->get('Scale'));
    /**
     * UniversalTheme
     */
    $theme_class=new UniversalTheme;
    $graph->SetTheme($theme_class);
    /**
     * By type.
     */
    if($data->get('type')=='line'){
      $graph->SetMargin($data->get('Margin/0'), $data->get('Margin/1'), $data->get('Margin/2'), $data->get('Margin/3'));
      $graph->img->SetAntiAliasing();
      $graph->yaxis->HideZeroLabel();
      $graph->xgrid->Show();
      $graph->xgrid->SetLineStyle("solid");
    }elseif($data->get('type')=='bar'){
      $graph->yaxis->SetTickPositions($data->get('TickPositions/aMajPos'), $data->get('TickPositions/aMinPos'));
      $graph->ygrid->SetFill(false);
    }
    $graph->SetBox(false);
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);
    /**
     * SetTickLabels
     */
    $graph->xaxis->SetTickLabels($data->get('TickLabels'));
    /**
     * SetColor
     */
    $graph->xgrid->SetColor('#E3E3E3');
    /**
     * plot
     */
    $plot = array();
    foreach($data->get('item') as $k => $v){
      if($data->get('type')=='line'){
        $plot[$k] = new LinePlot($v['data']);
        $graph->Add($plot[$k]);
        $plot[$k]->SetLegend($v['Legend']);
      }elseif($data->get('type')=='bar'){
        $plot[$k] = new BarPlot($v['data']);
      }
    }
    /**
     * gbplot
     */
    if($data->get('type')=='bar'){
      $plots = array_merge($plot);
      $gbplot = new GroupBarPlot($plots);
      $graph->Add($gbplot);
    }
    /**
     * SetFillColor
     */
    foreach($data->get('item') as $k => $v){
      if(isset($v['FillColor'])){
        $plot[$k]->SetFillColor($v['FillColor']);
      }
    }
    /**
     * SetColor
     */
    foreach($data->get('item') as $k => $v){
      if(isset($v['Color'])){
        $plot[$k]->SetColor($v['Color']);
      }
    }
    /**
     * SetFrameWeight
     */
    $graph->legend->SetFrameWeight(1);
    /**
     * title
     */
    $graph->title->Set($data->get('title'));
    /**
     * Stroke
     */
    if(!$data->get('FileName')){
      $graph->Stroke();
    }else{
      $graph->Stroke(wfGlobals::getAppDir().$data->get('FileName'));
    }
  }
}