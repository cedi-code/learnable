<!doctype html>
<html><head>
    <title>Coffeefy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <style>
        html, body {
            padding: 0px;
            margin: 0px;
            overflow: hidden;
        }

        canvas {
            width: 100%;
            height: 100%;
        }
        a {
            color: white;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }



        #container {
            position: fixed;
            top: 45%;
            width: 100%;
            height: auto;
            background: transparent;
        }
        #container #wrapper {
            width: 100%;
            height: auto;
            position: relative;
            background: transparent;
        }
        #container #wrapper #content {
            text-align: center;
            width: 100%;
            padding: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #ecf0f1;
            font-family: 'Source code pro', sans-serif;
            font-weight: 900;
            font-size: 400%;
            word-spacing: -10px;
            line-height: 1.3em;
        }

        @media screen and (max-width: 800px) {
            #container #wrapper #content {
                font-size: 210%;
            }

            @media screen and (max-width: 400px) {
                #container #wrapper #content {
                    font-size: 150%;
                }
            }
    </style>
</head>
<body><script id="2d-fragment-shader" type="x-shader/x-fragment">// <![CDATA[
  #ifdef GL_ES
  precision mediump float;
  #endif

  #define PI 3.14159265359;

  uniform vec2 u_resolution;
  uniform vec2 u_mouse;
  uniform float u_time;
  uniform float u_xpos;
  uniform float u_ypos;

vec3 mod289(vec3 x) {
  return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec4 mod289(vec4 x) {
  return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec4 permute(vec4 x) {
     return mod289(((x*34.0)+1.0)*x);
}

vec4 taylorInvSqrt(vec4 r)
{
  return 1.79284291400159 - 0.85373472095314 * r;
}

float snoise(vec3 v)
  {
  const vec2  C = vec2(1.0/6.0, 1.0/3.0) ;
  const vec4  D = vec4(0.0, 0.5, 1.0, 2.0);

  vec3 i  = floor(v + dot(v, C.yyy) );
  vec3 x0 =   v - i + dot(i, C.xxx) ;

  vec3 g = step(x0.yzx, x0.xyz);
  vec3 l = 1.0 - g;
  vec3 i1 = min( g.xyz, l.zxy );
  vec3 i2 = max( g.xyz, l.zxy );

  vec3 x1 = x0 - i1 + C.xxx;
  vec3 x2 = x0 - i2 + C.yyy;
  vec3 x3 = x0 - D.yyy;

  i = mod289(i);
  vec4 p = permute( permute( permute(
             i.z + vec4(0.0, i1.z, i2.z, 1.0 ))
           + i.y + vec4(0.0, i1.y, i2.y, 1.0 ))
           + i.x + vec4(0.0, i1.x, i2.x, 1.0 ));

  float n_ = 0.142857142857;
  vec3  ns = n_ * D.wyz - D.xzx;

  vec4 j = p - 49.0 * floor(p * ns.z * ns.z);

  vec4 x_ = floor(j * ns.z);
  vec4 y_ = floor(j - 7.0 * x_ );

  vec4 x = x_ *ns.x + ns.yyyy;
  vec4 y = y_ *ns.x + ns.yyyy;
  vec4 h = 1.0 - abs(x) - abs(y);

  vec4 b0 = vec4( x.xy, y.xy );
  vec4 b1 = vec4( x.zw, y.zw );

  vec4 s0 = floor(b0)*2.0 + 1.0;
  vec4 s1 = floor(b1)*2.0 + 1.0;
  vec4 sh = -step(h, vec4(0.0));

  vec4 a0 = b0.xzyw + s0.xzyw*sh.xxyy ;
  vec4 a1 = b1.xzyw + s1.xzyw*sh.zzww ;

  vec3 p0 = vec3(a0.xy,h.x);
  vec3 p1 = vec3(a0.zw,h.y);
  vec3 p2 = vec3(a1.xy,h.z);
  vec3 p3 = vec3(a1.zw,h.w);

  vec4 norm = taylorInvSqrt(vec4(dot(p0,p0), dot(p1,p1), dot(p2, p2), dot(p3,p3)));
  p0 *= norm.x;
  p1 *= norm.y;
  p2 *= norm.z;
  p3 *= norm.w;

  vec4 m = max(0.6 - vec4(dot(x0,x0), dot(x1,x1), dot(x2,x2), dot(x3,x3)), 0.0);
  m = m * m;
  return 42.0 * dot( m*m, vec4( dot(p0,x0), dot(p1,x1),
                                dot(p2,x2), dot(p3,x3) ) );
  }

  void main() {
    vec3 color1 = vec3(102.0/255.0,56.0/255.0,192.0/255.0);
    vec3 color2 = vec3(192.0/255.0,73.0/255.0,94.0/255.0);
    vec3 color3 = vec3(37.0/255.0,15.0/255.0,79.0/255.0);
    vec3 color4 = vec3(231.0/255.0,203.0/255.0,231.0/255.0);
    vec3 color5 = vec3(192.0/255.0,73.0/255.0,94.0/255.0);
    vec3 color6 = vec3(102.0/255.0,56.0/255.0,192.0/255.0);
    vec2 lt = vec2(gl_FragCoord.x + u_xpos, gl_FragCoord.y + u_ypos);
    vec2 st = lt.xy/u_resolution.xy;
    st.x *= u_resolution.x/u_resolution.y;
    vec3 color = vec3(0.0);
    vec2 pos = vec2(st*0.6);
    float DF = 0.0;
    float a = 0.0;
    vec2 vel = vec2(u_time*.1);
    st.xy *= 0.4;
    float r = snoise(vec3(st.x,st.y,u_time * 0.1));
    if(r >= -1.0 && r < -0.6){
      color = color1;
    } else if(r >= -0.6 && r < -0.2){
	 color = color2;
    } else if(r >= -0.2 && r < 0.2){
      color = color3;
    } else if(r >= 0.2 && r < 0.6){
    	 color = color4;
    } else {
      color = color5;
    }
    gl_FragColor = vec4(color,1.0);
  }
// ]]></script>
<script id="2d-vertex-shader" type="x-shader/x-vertex">// <![CDATA[
	attribute vec2 a_position;
	void main() {
		gl_Position = vec4(a_position, 0, 1);
	}
	// ]]></script>
<canvas id="glscreen" width="854" height="974"></canvas>
<section id="container">
    <section id="wrapper">
        <h1 id="content">
            &lt;/&thinsp;API&gt; <br>
            <span style="font-size: 60%"><a href="#">Documentation</a></span>
        </h1>

    </section>
</section>


<script>
    var canvas, gl; // canvas and webgl context

    var shaderScript;
    var shaderSource;
    var vertexShader; // Vertex shader.  Not much happens in that shader, it just creates the vertex's to be drawn on
    var fragmentShader; // this shader is where the magic happens. Fragment = pixel.  Vertex = kind of like "faces" on a 3d model.
    var buffer;


    /* Variables holding the location of uniform variables in the WebGL. We use this to send info to the WebGL script. */
    var locationOfTime;
    var locationOfResolution;

    var startTime = new Date().getTime(); // Get start time for animating
    var currentTime = 0;

    function init() {
        // standard canvas setup here, except get webgl context
        canvas = document.getElementById('glscreen');
        gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;

        // give WebGL it's viewport
        gl.viewport(0, 0, gl.drawingBufferWidth, gl.drawingBufferHeight);

        // kind of back-end stuff
        buffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
        gl.bufferData(
            gl.ARRAY_BUFFER,
            new Float32Array([
                -1.0, -1.0,
                1.0, -1.0,
                -1.0,  1.0,
                -1.0,  1.0,
                1.0, -1.0,
                1.0,  1.0]),
            gl.STATIC_DRAW
        ); // ^^ That up there sets up the vertex's used to draw onto. I think at least, I haven't payed much attention to vertex's yet, for all I know I'm wrong.

        shaderScript = document.getElementById("2d-vertex-shader");
        shaderSource = shaderScript.text;
        vertexShader = gl.createShader(gl.VERTEX_SHADER); //create the vertex shader from script
        gl.shaderSource(vertexShader, shaderSource);
        gl.compileShader(vertexShader);

        shaderScript   = document.getElementById("2d-fragment-shader");
        shaderSource   = shaderScript.text;
        fragmentShader = gl.createShader(gl.FRAGMENT_SHADER); //create the fragment from script
        gl.shaderSource(fragmentShader, shaderSource);
        gl.compileShader(fragmentShader);

        program = gl.createProgram(); // create the WebGL program.  This variable will be used to inject our javascript variables into the program.
        gl.attachShader(program, vertexShader); // add the shaders to the program
        gl.attachShader(program, fragmentShader); // ^^
        gl.linkProgram(program);	 // Tell our WebGL application to use the program
        gl.useProgram(program); // ^^ yep, but now literally use it.


        /*

        Alright, so here we're attatching javascript variables to the WebGL code.  First we get the location of the uniform variable inside the program.

        We use the gl.getUniformLocation function to do this, and pass thru the program variable we created above, as well as the name of the uniform variable in our shader.

        */
        locationOfResolution = gl.getUniformLocation(program, "u_resolution");
        locationOfTime = gl.getUniformLocation(program, "u_time");


        /*

        Then we simply apply our javascript variables to the program.
        Notice, it gets a bit tricky doing this.  If you're editing a float value, gl.uniformf works.

        But if we want to send over an array of floats, for example, we'd use gl.uniform2f.  We're specifying that we are sending 2 floats at the end.

        You can also send it over to the program as a vector, by using gl.uniform2fv.
        To read up on all of the different gl.uniform** stuff, to send any variable you want, I'd recommend using the table (found on this site, but you need to scroll down about 300px)

        https://webglfundamentals.org/webgl/lessons/webgl-shaders-and-glsl.html#uniforms

        */
        gl.uniform2f(locationOfResolution, canvas.width, canvas.height);
        gl.uniform1f(locationOfTime, currentTime);

        render();
    }

    function render() {
        var now = new Date().getTime();
        currentTime = (now - startTime) / 5000; // update the current time for animations


        gl.uniform1f(locationOfTime, currentTime); // update the time uniform in our shader

        window.requestAnimationFrame(render, canvas); // request the next frame

        positionLocation = gl.getAttribLocation(program, "a_position"); // do stuff for those vertex's
        gl.enableVertexAttribArray(positionLocation);
        gl.vertexAttribPointer(positionLocation, 2, gl.FLOAT, false, 0, 0);
        gl.drawArrays(gl.TRIANGLES, 0, 6);
    }

    window.addEventListener('load', function(event){
        init();
    });

    window.addEventListener('resize', function(event){
        // just re-doing some stuff in the init here, to enable resizing.

        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
        gl.viewport(0, 0, window.innerWidth, window.innerHeight);
        locationOfResolution = gl.getUniformLocation(program, "u_resolution");
    });
</script>


</body></html>
