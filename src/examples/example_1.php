<html>
    <head>
        <script src="../libraries/aframe.min.js"></script>
        <script src="../libraries/aframe-ar.js"></script>
    </head>
    <body style="margin : 0px; overflow: hidden;">
        <a-scene embedded arjs>
            <a-marker preset="hiro">
                <a-entity position="0 0.5 5.8">
                    <a-camera></a-camera>
                </a-entity>
                <a-entity id="user" text="value: Misco Jones; width: 4; tabSize: 6; color:  #EF2D5E" position="2.4 3.65 0">
                </a-entity>
                <a-image id="photo" position="-0.4 3.15 0" src="../img/example_1/user_example_1.jpg" height="1.2" width="1.1" material="" visible="">
                </a-image>
                <a-entity id="home1" text="value: Calle verdadera 321, 28031; width: 2; color: #4CC3D9" position="1.43 3.3 0">
                </a-entity>
                <?php
                print "<a-entity id='home2' text='value: Madrid, "._("Spain")."; width: 2; color: #4CC3D9' position='01.43 3.15 0'>
                       </a-entity>";
                print "<a-entity id='phone' text='value: "._("Mobile").": 689353986; width: 2; color: #4CC3D9' position='1.43 3 0'>
                       </a-entity>";
                ?>
                <a-entity id="email" text="value: misco@jonesmail.com; width: 2; color: #4CC3D9" position="1.43 2.85 0">
                </a-entity>
                <?php
                print "<a-entity id='studies' text='value: "._("Studies").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 2.45 0'>
                       </a-entity>";
                ?>
                <a-entity id="date_start1" text="value: 19/9/2019; width: 2; color: #4CC3D9" position="0.04 2.25 0">
                </a-entity>
                <a-entity id="date_end1" text="value: 18/6/2020; width: 2; color: #4CC3D9" position="0.04 2.15 0">
                </a-entity>
                <?php
                print "<a-entity id='title' text='value: D.A.W."._(" in ")."J.R.Otero"._(" of ")."Madrid"._(" in ")._("Spain").".; width: 2; color: #4CC3D9' position='0.6 2.25 0'>
                       </a-entity>";
                print "<a-entity id='skills1' text='value: -"._("Programming in server and client environment").".; width: 2; color: #4CC3D9' position='0.65 2.10 0'>
                       </a-entity>";
                print "<a-entity id='works' text='value: "._("Work experience").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.8 0'>
                       </a-entity>";
                ?>
                <a-entity id="date_start2" text="value: 25/3/2019; width: 2; color: #4CC3D9" position="0.04 1.60 0">
                </a-entity>
                <a-entity id="date_end2" text="value: 13/6/2019; width: 2; color: #4CC3D9" position="0.04 1.5 0">
                </a-entity>
                <?php
                print "<a-entity id='experience' text='value: "._("Scholar")._(" in ")."CGM-Telecomunicaciones"._(" of ")."Madrid"._(" in ")._("Spain").".; width: 2; color: #4CC3D9' position='0.6 1.55 0'>
                </a-entity>";
                print "<a-entity id='licenses' text='value: "._("Licenses").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1.2 0'>
                </a-entity>";
                ?>
                <a-entity id="licenses_drive" text="value: B + E.; width: 2; color: #4CC3D9" position="0.6 1.2 0">
                </a-entity>
                <?php
                print "<a-entity id='other_skills' text='value: "._("Other skills").":; width: 3.5; tabSize: 6; color:  #EF2D5E' position='0.77 1 0'>
                </a-entity>";
                print "<a-entity id='skills2' text='value: "._("English medium level").". ; width: 2; color: #4CC3D9' position='0.04 0.8 0'>
                </a-entity>";
                ?>
            </a-marker>
        </a-scene>
    </body>
</html>