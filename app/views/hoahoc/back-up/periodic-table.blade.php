@extends('hoahoc.hoahoc-main')

@section("title")
	Bảng tuần hoàn | {{getTitle()}}
@endsection

@section('periodic-table')
<div class="container">
<table class="table" id="bang-tuan-hoan">
<tbody><tr>
<th class="w8">Nhóm</th>
<th class="w5">1</th>
<th class="w5">2</th>
<th class="w2">&nbsp;</th>
<th class="w5">3</th>
<th class="w5">4</th>
<th class="w5">5</th>
<th class="w5">6</th>
<th class="w5">7</th>
<th class="w5">8</th>
<th class="w5">9</th>
<th class="w5">10</th>
<th class="w5">11</th>
<th class="w5">12</th>
<th class="w5">13</th>
<th class="w5">14</th>
<th class="w5">15</th>
<th class="w5">16</th>
<th class="w5">17</th>
<th class="w5">18</th>
</tr>
<tr>
<th class="lbl">Chu Kì</th>
<td colspan="19"></td>
</tr>
<tr>
<th class="lbl">1</th>
<td class="xs"><div class="at_num">1</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/hydrogen"><abbr class="sym" title="hydrogen: essential data and description">H</abbr></a></div><div class="at_wt">1.008</div></td>
<td colspan="17"></td>
<td class="xp"><div class="at_num">2</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/helium"><abbr class="sym" title="helium: essential data and description">He</abbr></a></div><div class="at_wt">4.0026</div></td>
</tr>
<tr>
<th class="lbl">2</th>
<td class="xs"><div class="at_num">3</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/lithium"><abbr class="sym" title="lithium: essential data and description">Li</abbr></a></div><div class="at_wt">6.94</div></td>
<td class="xs"><div class="at_num">4</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/beryllium"><abbr class="sym" title="beryllium: essential data and description">Be</abbr></a></div><div class="at_wt">9.0122</div></td>
<td colspan="11"></td>
<td class="xp"><div class="at_num">5</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/boron"><abbr class="sym" title="boron: essential data and description">B</abbr></a></div><div class="at_wt">10.81</div></td>
<td class="xp"><div class="at_num">6</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/carbon"><abbr class="sym" title="carbon: essential data and description">C</abbr></a></div><div class="at_wt">12.011</div></td>
<td class="xp"><div class="at_num">7</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/nitrogen"><abbr class="sym" title="nitrogen: essential data and description">N</abbr></a></div><div class="at_wt">14.007</div></td>
<td class="xp"><div class="at_num">8</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/oxygen"><abbr class="sym" title="oxygen: essential data and description">O</abbr></a></div><div class="at_wt">15.999</div></td>
<td class="xp"><div class="at_num">9</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/fluorine"><abbr class="sym" title="fluorine: essential data and description">F</abbr></a></div><div class="at_wt">18.998</div></td>
<td class="xp"><div class="at_num">10</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/neon"><abbr class="sym" title="neon: essential data and description">Ne</abbr></a></div><div class="at_wt">20.180</div></td>
</tr>
<tr>
<th class="lbl">3</th>
<td class="xs"><div class="at_num">11</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/sodium"><abbr class="sym" title="sodium: essential data and description">Na</abbr></a></div><div class="at_wt">22.990</div></td>
<td class="xs"><div class="at_num">12</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/magnesium"><abbr class="sym" title="magnesium: essential data and description">Mg</abbr></a></div><div class="at_wt">24.305</div></td>
<td colspan="11">
</td>
<td class="xp"><div class="at_num">13</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/aluminium"><abbr class="sym" title="aluminium (aluminum in US): essential data and description">Al</abbr></a></div><div class="at_wt">26.982</div></td>
<td class="xp"><div class="at_num">14</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/silicon"><abbr class="sym" title="silicon: essential data and description">Si</abbr></a></div><div class="at_wt">28.085</div></td>
<td class="xp"><div class="at_num">15</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/phosphorus"><abbr class="sym" title="phosphorus: essential data and description">P</abbr></a></div><div class="at_wt">30.974</div></td>
<td class="xp"><div class="at_num">16</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/sulfur"><abbr class="sym" title="sulfur (sulphur in UK and elsewhere): essential data and description">S</abbr></a></div><div class="at_wt">32.06</div></td>
<td class="xp"><div class="at_num">17</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/chlorine"><abbr class="sym" title="chlorine: essential data and description">Cl</abbr></a></div><div class="at_wt">35.45</div></td>
<td class="xp"><div class="at_num">18</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/argon"><abbr class="sym" title="argon: essential data and description">Ar</abbr></a></div><div class="at_wt">39.948</div></td>
</tr>
<tr>
<th class="lbl">4</th>
<td class="xs"><div class="at_num">19</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/potassium"><abbr class="sym" title="potassium: essential data and description">K</abbr></a></div><div class="at_wt">39.098</div></td>
<td class="xs"><div class="at_num">20</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/calcium"><abbr class="sym" title="calcium: essential data and description">Ca</abbr></a></div><div class="at_wt">40.078</div></td>
<td></td>
<td class="xd"><div class="at_num">21</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/scandium"><abbr class="sym" title="scandium: essential data and description">Sc</abbr></a></div><div class="at_wt">44.956</div></td>
<td class="xd"><div class="at_num">22</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/titanium"><abbr class="sym" title="titanium: essential data and description">Ti</abbr></a></div><div class="at_wt">47.867</div></td>
<td class="xd"><div class="at_num">23</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/vanadium"><abbr class="sym" title="vanadium: essential data and description">V</abbr></a></div><div class="at_wt">50.942</div></td>
<td class="xd"><div class="at_num">24</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/chromium"><abbr class="sym" title="chromium: essential data and description">Cr</abbr></a></div><div class="at_wt">51.996</div></td>
<td class="xd"><div class="at_num">25</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/manganese"><abbr class="sym" title="manganese: essential data and description">Mn</abbr></a></div><div class="at_wt">54.938</div></td>
<td class="xd"><div class="at_num">26</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/iron"><abbr class="sym" title="iron: essential data and description">Fe</abbr></a></div><div class="at_wt">55.845</div></td>
<td class="xd"><div class="at_num">27</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/cobalt"><abbr class="sym" title="cobalt: essential data and description">Co</abbr></a></div><div class="at_wt">58.933</div></td>
<td class="xd"><div class="at_num">28</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/nickel"><abbr class="sym" title="nickel: essential data and description">Ni</abbr></a></div><div class="at_wt">58.693</div></td>
<td class="xd"><div class="at_num">29</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/copper"><abbr class="sym" title="copper: essential data and description">Cu</abbr></a></div><div class="at_wt">63.546</div></td>
<td class="xd"><div class="at_num">30</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/zinc"><abbr class="sym" title="zinc: essential data and description">Zn</abbr></a></div><div class="at_wt">65.38</div></td>
<td class="xp"><div class="at_num">31</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/gallium"><abbr class="sym" title="gallium: essential data and description">Ga</abbr></a></div><div class="at_wt">69.723</div></td>
<td class="xp"><div class="at_num">32</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/germanium"><abbr class="sym" title="germanium: essential data and description">Ge</abbr></a></div><div class="at_wt">72.63</div></td>
<td class="xp"><div class="at_num">33</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/arsenic"><abbr class="sym" title="arsenic: essential data and description">As</abbr></a></div><div class="at_wt">74.922</div></td>
<td class="xp"><div class="at_num">34</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/selenium"><abbr class="sym" title="selenium: essential data and description">Se</abbr></a></div><div class="at_wt">78.96</div></td>
<td class="xp"><div class="at_num">35</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/bromine"><abbr class="sym" title="bromine: essential data and description">Br</abbr></a></div><div class="at_wt">79.904</div></td>
<td class="xp"><div class="at_num">36</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/krypton"><abbr class="sym" title="krypton: essential data and description">Kr</abbr></a></div><div class="at_wt">83.798</div></td>
</tr>
<tr>
<th class="lbl">5</th>
<td class="xs"><div class="at_num">37</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/rubidium"><abbr class="sym" title="rubidium: essential data and description">Rb</abbr></a></div><div class="at_wt">85.468</div></td>
<td class="xs"><div class="at_num">38</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/strontium"><abbr class="sym" title="strontium: essential data and description">Sr</abbr></a></div><div class="at_wt">87.62</div></td>
<td></td>
<td class="xd"><div class="at_num">39</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/yttrium"><abbr class="sym" title="yttrium: essential data and description">Y</abbr></a></div><div class="at_wt">88.906</div></td>
<td class="xd"><div class="at_num">40</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/zirconium"><abbr class="sym" title="zirconium: essential data and description">Zr</abbr></a></div><div class="at_wt">91.224</div></td>
<td class="xd"><div class="at_num">41</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/niobium"><abbr class="sym" title="niobium: essential data and description">Nb</abbr></a></div><div class="at_wt">92.906</div></td>
<td class="xd"><div class="at_num">42</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/molybdenum"><abbr class="sym" title="molybdenum: essential data and description">Mo</abbr></a></div><div class="at_wt">95.96</div></td>
<td class="xd"><div class="at_num">43</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/technetium"><abbr class="sym" title="technetium: essential data and description">Tc</abbr></a></div><div class="at_wt">[97.91]</div></td>
<td class="xd"><div class="at_num">44</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ruthenium"><abbr class="sym" title="ruthenium: essential data and description">Ru</abbr></a></div><div class="at_wt">101.07</div></td>
<td class="xd"><div class="at_num">45</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/rhodium"><abbr class="sym" title="rhodium: essential data and description">Rh</abbr></a></div><div class="at_wt">102.91</div></td>
<td class="xd"><div class="at_num">46</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/palladium"><abbr class="sym" title="palladium: essential data and description">Pd</abbr></a></div><div class="at_wt">106.42</div></td>
<td class="xd"><div class="at_num">47</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/silver"><abbr class="sym" title="silver: essential data and description">Ag</abbr></a></div><div class="at_wt">107.87</div></td>
<td class="xd"><div class="at_num">48</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/cadmium"><abbr class="sym" title="cadmium: essential data and description">Cd</abbr></a></div><div class="at_wt">112.41</div></td>
<td class="xp"><div class="at_num">49</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/indium"><abbr class="sym" title="indium: essential data and description">In</abbr></a></div><div class="at_wt">114.82</div></td>
<td class="xp"><div class="at_num">50</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/tin"><abbr class="sym" title="tin: essential data and description">Sn</abbr></a></div><div class="at_wt">118.71</div></td>
<td class="xp"><div class="at_num">51</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/antimony"><abbr class="sym" title="antimony: essential data and description">Sb</abbr></a></div><div class="at_wt">121.76</div></td>
<td class="xp"><div class="at_num">52</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/tellurium"><abbr class="sym" title="tellurium: essential data and description">Te</abbr></a></div><div class="at_wt">127.60</div></td>
<td class="xp"><div class="at_num">53</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/iodine"><abbr class="sym" title="iodine: essential data and description">I</abbr></a></div><div class="at_wt">126.90</div></td>
<td class="xp"><div class="at_num">54</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/xenon"><abbr class="sym" title="xenon: essential data and description">Xe</abbr></a></div><div class="at_wt">131.29</div></td>
</tr>
<tr>
<th class="lbl">6 </th>
<td class="xs"><div class="at_num">55</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/caesium"><abbr class="sym" title="caesium (cesium in US): essential data and description">Cs</abbr></a></div><div class="at_wt">132.91</div></td>
<td class="xs"><div class="at_num">56</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/barium"><abbr class="sym" title="barium: essential data and description">Ba</abbr></a></div><div class="at_wt">137.33</div></td>
<th class="asterisk">*</th>
<td class="xd"><div class="at_num">71</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/lutetium"><abbr class="sym" title="lutetium: essential data and description">Lu</abbr></a></div><div class="at_wt">174.97</div></td>
<td class="xd"><div class="at_num">72</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/hafnium"><abbr class="sym" title="hafnium: essential data and description">Hf</abbr></a></div><div class="at_wt">178.49</div></td>
<td class="xd"><div class="at_num">73</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/tantalum"><abbr class="sym" title="tantalum: essential data and description">Ta</abbr></a></div><div class="at_wt">180.95</div></td>
<td class="xd"><div class="at_num">74</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/tungsten"><abbr class="sym" title="tungsten: essential data and description">W</abbr></a></div><div class="at_wt">183.84</div></td>
<td class="xd"><div class="at_num">75</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/rhenium"><abbr class="sym" title="rhenium: essential data and description">Re</abbr></a></div><div class="at_wt">186.21</div></td>
<td class="xd"><div class="at_num">76</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/osmium"><abbr class="sym" title="osmium: essential data and description">Os</abbr></a></div><div class="at_wt">190.23</div></td>
<td class="xd"><div class="at_num">77</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/iridium"><abbr class="sym" title="iridium: essential data and description">Ir</abbr></a></div><div class="at_wt">192.22</div></td>
<td class="xd"><div class="at_num">78</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/platinum"><abbr class="sym" title="platinum: essential data and description">Pt</abbr></a></div><div class="at_wt">195.08</div></td>
<td class="xd"><div class="at_num">79</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/gold"><abbr class="sym" title="gold: essential data and description">Au</abbr></a></div><div class="at_wt">196.97</div></td>
<td class="xd"><div class="at_num">80</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/mercury"><abbr class="sym" title="mercury: essential data and description">Hg</abbr></a></div><div class="at_wt">200.59</div></td>
<td class="xp"><div class="at_num">81</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/thallium"><abbr class="sym" title="thallium: essential data and description">Tl</abbr></a></div><div class="at_wt">204.38</div></td>
<td class="xp"><div class="at_num">82</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/lead"><abbr class="sym" title="lead: essential data and description">Pb</abbr></a></div><div class="at_wt">207.2</div></td>
<td class="xp"><div class="at_num">83</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/bismuth"><abbr class="sym" title="bismuth: essential data and description">Bi</abbr></a></div><div class="at_wt">208.98</div></td>
<td class="xp"><div class="at_num">84</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/polonium"><abbr class="sym" title="polonium: essential data and description">Po</abbr></a></div><div class="at_wt">[208.98]</div></td>
<td class="xp"><div class="at_num">85</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/astatine"><abbr class="sym" title="astatine: essential data and description">At</abbr></a></div><div class="at_wt">[209.99]</div></td>
<td class="xp"><div class="at_num">86</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/radon"><abbr class="sym" title="radon: essential data and description">Rn</abbr></a></div><div class="at_wt">[222.02]</div></td>
</tr>
<tr>
<th class="lbl">7 </th>
<td class="xs"><div class="at_num">87</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/francium"><abbr class="sym" title="francium: essential data and description">Fr</abbr></a></div><div class="at_wt">[223.02]</div></td>
<td class="xs"><div class="at_num">88</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/radium"><abbr class="sym" title="radium: essential data and description">Ra</abbr></a></div><div class="at_wt">[226.03]</div></td>
<th class="asterisk">**</th>
<td class="xd"><div class="at_num">103</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/lawrencium"><abbr class="sym" title="lawrencium: essential data and description">Lr</abbr></a></div><div class="at_wt">[262.11]</div></td>
<td class="xd"><div class="at_num">104</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/rutherfordium"><abbr class="sym" title="rutherfordium: essential data and description">Rf</abbr></a></div><div class="at_wt">[265.12]</div></td>
<td class="xd"><div class="at_num">105</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/dubnium"><abbr class="sym" title="dubnium: essential data and description">Db</abbr></a></div><div class="at_wt">[268.13]</div></td>
<td class="xd"><div class="at_num">106</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/seaborgium"><abbr class="sym" title="seaborgium: essential data and description">Sg</abbr></a></div><div class="at_wt">[271.13]</div></td>
<td class="xd"><div class="at_num">107</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/bohrium"><abbr class="sym" title="bohrium: essential data and description">Bh</abbr></a></div><div class="at_wt">[270]</div></td>
<td class="xd"><div class="at_num">108</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/hassium"><abbr class="sym" title="hassium: essential data and description">Hs</abbr></a></div><div class="at_wt">[277.15]</div></td>
<td class="xd"><div class="at_num">109</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/meitnerium"><abbr class="sym" title="meitnerium: essential data and description">Mt</abbr></a></div><div class="at_wt">[276.15]</div></td>
<td class="xd"><div class="at_num">110</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/darmstadtium"><abbr class="sym" title="darmstadtium: essential data and description">Ds</abbr></a></div><div class="at_wt">[281.16]</div></td>
<td class="xd"><div class="at_num">111</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/roentgenium"><abbr class="sym" title="roentgenium: essential data and description">Rg</abbr></a></div><div class="at_wt">[280.16]</div></td>
<td class="xd"><div class="at_num">112</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/copernicium"><abbr class="sym" title="copernicium: essential data and description">Cn</abbr></a></div><div class="at_wt">[285.17]</div></td>
<td class="xp"><div class="at_num">113</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ununtrium"><abbr class="sym" title="ununtrium: essential data and description">Uut</abbr></a></div><div class="at_wt">[284.18]</div></td>
<td class="xp"><div class="at_num">114</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/flerovium"><abbr class="sym" title="flerovium: essential data and description">Fl</abbr></a></div><div class="at_wt">[289.19]</div></td>
<td class="xp"><div class="at_num">115</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ununpentium"><abbr class="sym" title="ununpentium: essential data and description">Uup</abbr></a></div><div class="at_wt">[288.19]</div></td>
<td class="xp"><div class="at_num">116</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/livermorium"><abbr class="sym" title="livermorium: essential data and description">Lv</abbr></a></div><div class="at_wt">[293]</div></td>
<td class="xp"><div class="at_num">117</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ununseptium"><abbr class="sym" title="ununseptium: essential data and description">Uus</abbr></a></div><div class="at_wt">[294]</div></td>
<td class="xp"><div class="at_num">118</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ununoctium"><abbr class="sym" title="ununoctium: essential data and description">Uuo</abbr></a></div><div class="at_wt">[294]</div></td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="19"></td>
</tr>
<tr>
<th class="lbl" colspan="3">*Lanthanoids</th>
<th class="asterisk">*</th>
<td class="xf"><div class="at_num">57</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/lanthanum"><abbr class="sym" title="lanthanum: essential data and description">La</abbr></a></div><div class="at_wt">138.91</div></td>
<td class="xf"><div class="at_num">58</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/cerium"><abbr class="sym" title="cerium: essential data and description">Ce</abbr></a></div><div class="at_wt">140.12</div></td>
<td class="xf"><div class="at_num">59</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/praseodymium"><abbr class="sym" title="praseodymium: essential data and description">Pr</abbr></a></div><div class="at_wt">140.91</div></td>
<td class="xf"><div class="at_num">60</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/neodymium"><abbr class="sym" title="neodymium: essential data and description">Nd</abbr></a></div><div class="at_wt">144.24</div></td>
<td class="xf"><div class="at_num">61</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/promethium"><abbr class="sym" title="promethium: essential data and description">Pm</abbr></a></div><div class="at_wt">[144.91]</div></td>
<td class="xf"><div class="at_num">62</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/samarium"><abbr class="sym" title="samarium: essential data and description">Sm</abbr></a></div><div class="at_wt">150.36</div></td>
<td class="xf"><div class="at_num">63</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/europium"><abbr class="sym" title="europium: essential data and description">Eu</abbr></a></div><div class="at_wt">151.96</div></td>
<td class="xf"><div class="at_num">64</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/gadolinium"><abbr class="sym" title="gadolinium: essential data and description">Gd</abbr></a></div><div class="at_wt">157.25</div></td>
<td class="xf"><div class="at_num">65</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/terbium"><abbr class="sym" title="terbium: essential data and description">Tb</abbr></a></div><div class="at_wt">158.93</div></td>
<td class="xf"><div class="at_num">66</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/dysprosium"><abbr class="sym" title="dysprosium: essential data and description">Dy</abbr></a></div><div class="at_wt">162.50</div></td>
<td class="xf"><div class="at_num">67</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/holmium"><abbr class="sym" title="holmium: essential data and description">Ho</abbr></a></div><div class="at_wt">164.93</div></td>
<td class="xf"><div class="at_num">68</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/erbium"><abbr class="sym" title="erbium: essential data and description">Er</abbr></a></div><div class="at_wt">167.26</div></td>
<td class="xf"><div class="at_num">69</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/thulium"><abbr class="sym" title="thulium: essential data and description">Tm</abbr></a></div><div class="at_wt">168.93</div></td>
<td class="xf"><div class="at_num">70</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/ytterbium"><abbr class="sym" title="ytterbium: essential data and description">Yb</abbr></a></div><div class="at_wt">173.05</div></td>
<td colspan="2"></td>
</tr>
<tr>
<th class="lbl" colspan="3">**Actinoids</th>
<th class="asterisk">**</th>
<td class="xf"><div class="at_num">89</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/actinium"><abbr class="sym" title="actinium: essential data and description">Ac</abbr></a></div><div class="at_wt">[227.03]</div></td>
<td class="xf"><div class="at_num">90</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/thorium"><abbr class="sym" title="thorium: essential data and description">Th</abbr></a></div><div class="at_wt">232.04</div></td>
<td class="xf"><div class="at_num">91</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/protactinium"><abbr class="sym" title="protactinium: essential data and description">Pa</abbr></a></div><div class="at_wt">231.04</div></td>
<td class="xf"><div class="at_num">92</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/uranium"><abbr class="sym" title="uranium: essential data and description">U</abbr></a></div><div class="at_wt">238.03</div></td>
<td class="xf"><div class="at_num">93</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/neptunium"><abbr class="sym" title="neptunium: essential data and description">Np</abbr></a></div><div class="at_wt">[237.05]</div></td>
<td class="xf"><div class="at_num">94</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/plutonium"><abbr class="sym" title="plutonium: essential data and description">Pu</abbr></a></div><div class="at_wt">[244.06]</div></td>
<td class="xf"><div class="at_num">95</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/americium"><abbr class="sym" title="americium: essential data and description">Am</abbr></a></div><div class="at_wt">[243.06]</div></td>
<td class="xf"><div class="at_num">96</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/curium"><abbr class="sym" title="curium: essential data and description">Cm</abbr></a></div><div class="at_wt">[247.07]</div></td>
<td class="xf"><div class="at_num">97</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/berkelium"><abbr class="sym" title="berkelium: essential data and description">Bk</abbr></a></div><div class="at_wt">[247.07]</div></td>
<td class="xf"><div class="at_num">98</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/californium"><abbr class="sym" title="californium: essential data and description">Cf</abbr></a></div><div class="at_wt">[251.08]</div></td>
<td class="xf"><div class="at_num">99</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/einsteinium"><abbr class="sym" title="einsteinium: essential data and description">Es</abbr></a></div><div class="at_wt">[252.08]</div></td>
<td class="xf"><div class="at_num">100</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/fermium"><abbr class="sym" title="fermium: essential data and description">Fm</abbr></a></div><div class="at_wt">[257.10]</div></td>
<td class="xf"><div class="at_num">101</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/mendelevium"><abbr class="sym" title="mendelevium: essential data and description">Md</abbr></a></div><div class="at_wt">[258.10]</div></td>
<td class="xf"><div class="at_num">102</div><div class="symbol"><a class="symb" href="https://vi.wikipedia.org/wiki/nobelium"><abbr class="sym" title="nobelium: essential data and description">No</abbr></a></div><div class="at_wt">[259.10]</div></td>
<td colspan="2"></td>
</tr>
</tbody></table>
 </div>
@endsection

