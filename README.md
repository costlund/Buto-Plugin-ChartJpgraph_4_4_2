# Buto-Plugin-ChartJpgraph_4_4_2



<a name="key_0"></a>

## Settings



<a name="key_1"></a>

## Usage



<a name="key_2"></a>

## Pages



<a name="key_3"></a>

## Widgets



<a name="key_4"></a>

## Event



<a name="key_5"></a>

## Construct



<a name="key_5_0"></a>

### __construct



<a name="key_6"></a>

## Methods



<a name="key_6_0"></a>

### get_graph

<p>Run method to render image or create.</p>
<pre><code>wfPlugin::includeonce('chart/jpgraph_4_4_2');
$jpgraph = new PluginChartJpgraph_4_4_2();
$data = new PluginWfYml(__DIR__.'/graphs/line.yml');
$jpgraph-&gt;get_graph($data-&gt;get());    </code></pre>

<a name="key_6_0_0"></a>

#### Line

<pre><code>type: line
title: 'Filled Y-grid'
aWidth: 700
aHeight: 250
aCachedName: auto
Scale: textlin
TickLabels:
  - A
  - B
  - C
  - D
  - E
item:
  -
    data:
      - 20
      - 15
      - 23
      - 15
      - 50
    Color: '#6495ED'
    Legend: 'Line 1'
  -
    data:
      - 12
      - 9
      - 42
      - 8
      - 55
    Color: '#B22222'
    Legend: 'Line 2'
  -
    data:
      - 5
      - 17
      - 32
      - 24
      - 60
    Color: '#FF1493'
    Legend: 'Line 3'
Margin:
  - 40
  - 20
  - 36
  - 63
</code></pre>

<a name="key_6_0_1"></a>

#### Bar

<pre><code>type: bar
_FileName: /plugin/chart/jpgraph_demo/MY_BAR.png
title: 'Bar Plots'
aWidth: 800
aHeight: 400
aCachedName: auto
Scale: textlin
TickPositions:
  aMajPos:
    - 0
    - 30
    - 60
    - 90
    - 120
    - 150
  aMinPos:
    - 15
    - 45
    - 75
    - 105
    - 135
TickLabels:
  - A
  - B
  - C
  - D
item:
  -
    data:
      - 47
      - 80
      - 40
      - 116
    Color: '#6495ED'
    FillColor: '#cc1111'
  -
    data:
      - 61
      - 30
      - 82
      - 105
    Color: '#6495ED'
    FillColor: '#11cccc'
  -
    data:
      - 115
      - 50
      - 70
      - 93
    Color: '#6495ED'
    FillColor: '#1111cc'</code></pre>

