<html>
  <head>
        <script src="../libraries/aframe.min.js"></script>
        <script src="../libraries/aframe-ar.js"></script>
  </head>
  <body>
    <a-assets>
        <img id="fondo" src="../img/example_3/suelo.png">
        <img id="fondo_normal" src="../img/example_3/suelo_normal.png">
    </a-assets>
        <a-scene embedded arjs>
            <a-marker preset="hiro">
                <a-entity position="0 0 10">
                    <a-camera></a-camera>
                </a-entity>
                <a-entity>
                    <a-plane position="0 0 -1" material="src:#fondo; normal-map:#fondo_normal; repeat: 7 7 1; normal-texture-repeat: 7 7 1" scale="15 15 1">
                    </a-plane>
                </a-entity>
                
                <a-image id="photo" position="-0.13 1.8 0" scale="0.55 0.55 1" src="../img/example_3/user_example_3.jpg" height="1.2" width="1.1" material="" visible="" animation="property: scale; to: 1.25 1.4 1; dur: 2500">
                </a-image>
                <a-text id="user" rotation="0 0 30" value="Ricardo Milos" position="-2.2 2.75 0" color="black"   font="mozillavr" tabSize="6" width="6"></a-text>
                <a-text id="home" rotation="0 0 -13" value="Calle Mazarredo 24, 28005" position="-0.85 3.3 0" color="black"   font="mozillavr" tabSize="6" width='3'></a-text>
                <?php
                print "<a-text id='country' rotation='0 0 -13' value='Madrid, "._("Spain")."' position='-0.9 3.15 0' color='black'   font='mozillavr' tabSize='6' width='3'></a-text>
                <a-text id='phone' rotation='0 0 25' value='"._("Mobile").": 689525986' position='0.35 3.15 0' color='black'  font='mozillavr' tabSize='6' width='3'></a-text>";
                ?>
                <a-text id="email" rotation="0 0 25" value="ricardo@milosmail.com" position="0.55 3.05 0" color="black"   font="mozillavr" tabSize="6" width="3"></a-text>
                <?php
                print "<a-text id='studies' rotation='0 0 30' value='"._("Studies")."' position='-2.1 0 0' color='black'   font='mozillavr' tabSize='6' width='5.5'></a-text>";
                ?>
                <a-text id="date_start1" rotation="0 0 30" value="19/9/2019" position="-2 -0.25 0" color="black"   font="mozillavr" tabSize="6" width="2.5"></a-text>
                <a-text id="date_end1" rotation="0 0 30" value="18/6/2020" position="-1.96 -0.35 0" color="black"   font="mozillavr" tabSize="6" width="2.5"></a-text>
                <?php
                print "<a-text id='title' rotation='0 0 30' value='D.A.W."._(" in ")."J.R.Otero"._(" of ")."Madrid"._(" in ")._("Spain")."' position='-1.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>
                <a-text id='skils1' rotation='0 0 30' value='-"._("Programming in server and client environment").".' position='-1.3 -0.2 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>
            
                <a-text id='works' rotation='0 0 30' value='"._("Work experience")."' position='-0.3 0 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>";
                ?>
                <a-text id="date_start2" rotation="0 0 30" value="25/3/2019" position="-0.2 -0.25 0" color="black"   font="mozillavr" tabSize="6" width="2.5"></a-text>
                <a-text id="date_end2" rotation="0 0 30" value="13/6/2019" position="-0.16 -0.35 0" color="black"   font="mozillavr" tabSize="6" width="2.5"></a-text>
                <?php
                print "<a-text id='experience' rotation='0 0 30' value='"._("Scholar")._(" in ")."CGM-Telecomunicaciones"._(" of ")."Madrid"._(" in ")._("Spain").".' position='0.4 0 0' color='black' font='mozillavr' tabSize='6' width='2.5' scale='0.8'></a-text>
                
                <a-text id='licenses' rotation='0 0 35' value='"._("Licenses")."' position='-2.1 1.9 0' color='black' font='mozillavr' tabSize='6' width='5.5'></a-text>";
                ?>
                <a-text id="licenses_drive" rotation="0 0 -13" value="b,a,c + e,d1" position="-1.6 1.95 0" color="black"   font="mozillavr" tabSize="6" width="3"></a-text>
                <?php
                print "<a-text id='other_skills' rotation='0 0 35' value='"._("Other skills")."' position='0.55 2 0' color='black'   font='mozillavr' tabSize='6' width='5'></a-text>
                <a-text id='skils2' rotation='0 0 35' position='0.6 1.65 0' scale='0.75' value='"._("English medium level").".' color='black'   font='mozillavr' tabSize='6' width='2.4'></a-text>";
                ?>
            </a-marker>
        </a-scene>
    </body>
</html>