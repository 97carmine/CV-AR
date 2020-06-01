<html>
    <head>
       <meta charset="UTF-8">
        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
        <script src="https://raw.githack.com/AR-js-org/AR.js/3.0.2/aframe/build/aframe-ar.js"></script>
    </head>
    <body style="margin : 0px; overflow: hidden;">
    
    <a-assets>
        <img id="fondo" src="img/example_2/fondo.png">
    </a-assets>
    
    <a-scene embedded arjs>
        <a-marker preset="hiro">
            <a-entity position="0 0.5 11">
                <a-camera></a-camera>
            </a-entity>
            <a-entity>
                <a-plane position="0 2.1 -0.2" scale="15 15 1">
                </a-plane>
            </a-entity>
            <a-entity>
                <a-plane material="src:#fondo;" position="0 2.1 -0.1" scale="4.05 4.5 1">
                </a-plane>
            </a-entity>
            
            <a-entity>
                <a-sphere material="color:blue;" scale="0.08 0.08 0.08" position="-0.35 3.05 0.8"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 360 0 0; loop: true; dur: 5000"  scale="0.05 0.05 0.05" position="-0.35 3.1 0.75">
                <a-sphere position="0 1 -3" scale="0.5 0.5 0.5"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 0 360 0; loop: true; dur: 5000"  scale="0.05 0.05 0.05" position="-0.35 3. 0.8">
                <a-sphere position="0 1 -3" scale="0.5 0.5 0.5"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 0 0 360; loop: true; dur: 5000"  scale="0.1 0.1 0.1" position="-0.35 3.05 1.1">
                <a-sphere position="0 1 -3" scale="0.2 0.2 0.2"></a-sphere>
            </a-entity>
        
            <a-entity id="user" text="value: Elba Jinon; width: 4; tabSize: 6" position="1 4 0">
            </a-entity>
            <a-image id="foto" position="-1.45 3.6 0" src="img/example_2/user2.jpg" height="1" width="0.8" material="" geometry="" visible="">
            </a-image>
            <a-entity id="home1" text="value: Calle Mazarredo 24, 28005; width: 2" position="-0.86 3 0">
            </a-entity>
            <?php
            print "<a-entity id='home2' text='value: Madrid, "._("Spain")."; width: 2' position='-0.86 2.85 0'>
                    </a-entity>";
            print "<a-entity id='phone' text='value: "._("Mobile").": 689525986; width: 2' position='-0.86 2.7 0'>
                    </a-entity>";
            ?>
            <a-entity id="email" text="value: correofalso@failmail.com; width: 2;" position="-0.86 2.55 0" id="email">
            </a-entity>

            <?php
            print "<a-entity id='studies' text='value: "._("Studies").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='-0.75 1.9 0' rotation='0 0 48'>
                    </a-entity>";
            ?>
            <a-entity id="date_start1" text="value: 19/9/2019; width: 2; color: black" position="-1.12 1.24 0" rotation="0 0 48">
            </a-entity>
            <a-entity id="date_end1" text="value: 18/6/2020; width: 2; color: black" position="-1.03 1.14 0" rotation="0 0 48">
            </a-entity>
            <?php
            print "<a-entity id='title' text='value: D.A.W."._(" in ")."J.R.Otero"._(" of ")."Madrid"._(" in ")._("Spain").".; width: 2; color: black' position='-0.8 1.6 0' rotation='0 0 48'>
                    </a-entity>";
            print "<a-entity id='skills1' text='value: -"._("Programming in server and client environment").".; width: 2; color: black' position='-0.7 1.5 0' rotation='0 0 48'>
                    </a-entity>";

            print "<a-entity id='works' text='value: "._("Work experience").":; width: 3.5; tabSize: 6; color: #EF2D5E' position='0.85 3.8 0' rotation='0 0 49'>
                    </a-entity>";
            ?>
            <a-entity id="date_start2" text="value: 25/3/2019; width: 2; color: black" position="0.47 3.13 0" rotation="0 0 49">
            </a-entity>
            <a-entity id="date_end2" text="value: 13/6/2019; width: 2; color: black" position="0.57 3.03 0" rotation="0 0 49">
            </a-entity>
            <?php
            print "<a-entity id='experience' text='value: "._("Scholar")._(" in ")."CGM-Telecomunicaciones"._(" of ")."Madrid"._(" in ")._("Spain").".; width: 2; color: black' position='0.85 3.5 0' rotation='0 0 49'>
                </a-entity>";
            ?>
            
            <a-entity>
                <a-sphere material="color:blue;" scale="0.08 0.08 0.08" position="1 2.05 0.8"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 360 0 0; loop: true; dur: 5000"  scale="0.05 0.05 0.05" position="1 2.05 0.75">
                <a-sphere position="0 1 -3" scale="0.5 0.5 0.5"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 0 360 0; loop: true; dur: 5000"  scale="0.05 0.05 0.05" position="1 2 0.8">
                <a-sphere position="0 1 -3" scale="0.5 0.5 0.5"></a-sphere>
            </a-entity>
            <a-entity rotation="0 0 0" animation="property: rotation; to: 0 0 360; loop: true; dur: 5000"  scale="0.1 0.1 0.1" position="1 2.05 1.1">
                <a-sphere position="0 1 -3" scale="0.2 0.2 0.2"></a-sphere>
            </a-entity>
            
            <?php
            print "<a-entity id='licenses' text='value: "._("Licenses").":; width: 3.5; tabSize: 6; color: black' position='2 1.2 0'>
            </a-entity>";
            ?>
            <a-entity id="licenses_drive" text="value: B + E.; width: 2; color: black" position="1.8 1.2 0">
            </a-entity>
            
            <?php
            print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color: black' position='1.65 0.85 0'>
            </a-entity>";
            print "<a-entity id='skills2' text='value: "._("English medium level").". ; width: 2; color: black' position='0.92 0.7 0'>
            </a-entity>";
            ?>
        </a-marker>
    </a-scene>
    </body>
</html>