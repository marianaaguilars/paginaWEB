
<!DOCTYPE  html>
  <head>
   
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-particle-system-component@1.0.x/dist/aframe-particle-system-component.min.js"></script>  

    <img id="objetoTexture" src="TexturaMadera.jpg">
    <img id="antenaTexture" src="textura.png">
    <img id="fondoTexture" src="Galaxia.jpg">
</head>
  <body>
    <a-scene>
   
 
     <a-box position="1 1 -5" rotation="0 45 1" width="2"  src="#objetoTexture"></a-box>

    <a-box position="0.42 1.0 -4.4" rotation="0 50 1" width="0.24" height="0.96" color="red"></a-box>
    <a-box position="0.58 1 -4.58" rotation="0 50 1" width="0.24" height="0.96" color="green"></a-box>
    <a-box position="0.64 1 -4.6" rotation="0 50 1" width="0.16" height="0.96" color="#91FF49"></a-box>
    <a-box position="0.8 1 -4.78" rotation="0 50 1" width="0.3" height="0.96" color="#C94EFC"></a-box>
    <a-box position="0.99 1 -4.97" rotation="0 50 1" width="0.24" height="0.96" color="#FFB5EF"></a-box>
    <a-box position="1.09 1 -5.073" rotation="0 50 1" width="0.24" height="0.96" color="#FAE882"></a-box>
     
    <a-cylinder position="1.57   1.18 -5.5" rotation="86 40 2" radius="0.2" height="1"  color="#FFC65D"></a-cylinder>                                                                       
    <a-cylinder position="1.86 1.2 -5.2" rotation="86 20 80" radius="0.15" height="0.1"  color="#98FA38"></a-cylinder>
    
    <a-cylinder position="1.57   0.73 -5.5" rotation="86 40 2" radius="0.2" height="1"  color="#51C6F5"></a-cylinder> 
    <a-cylinder position="1.9 0.74 -5.14" rotation="0.5 40 80" radius="0.15" height="0.1"  color="#FFC65D"></a-cylinder>

    <a-box position="0.8 1.7 -4.79" rotation="45 50 1" width="0.1" height="0.1" src="#antenaTexture"></a-box>
    <a-box position="1.2 1.7 -4.9" rotation="103 90 6" width="0.1" height="0.1" src="#antenaTexture"></a-box>



    <a-box position="0.5 0.2 -4.9" rotation="103 90 6" width="0.1" height="0.1" src="#objetoTexture"></a-box>
    <a-box position="0.9 0.2 -4.8" rotation="103 90 6" width="0.1" height="0.1" src="#objetoTexture"></a-box>
    
    
    <a-box position="1.6 0.4 -5.4" rotation="70 90 30" width="0.1" height="0.1" src="#objetoTexture"></a-box>
    <a-box position="1.6 0.4 -5" rotation="70 90 30" width="0.1" height="0.1" src="#objetoTexture"></a-box>


     <!-- <a-plane position="0 0 -4" rotation="-90 0 0" width="4" height="4" color="#7BC8A4"></a-plane>-->
      <a-sky src="#fondoTexture" radius="80"></a-sky>
    </a-scene>
  </body>
</html>