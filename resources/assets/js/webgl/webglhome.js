const WebGLHome = () => {
  let body = document.body;
  let html = document.documentElement;
  let canvas;
  let camera;
  let renderer;
  let scene;
  let plane;
  let loader;
  let uniforms;
  let h;
  let w;
  let up = true;
  let value = 0;
  let increment = 1;
  let ceiling = 150;

  let vertexShader = `
    varying vec2 vUv;

    void main() {
      vUv = uv;
      gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
    }
  `;

  let fragmentShader = `
    uniform sampler2D texture;
    uniform float timex;
    uniform float timey;
    varying vec2 vUv;

    void main () {
      vec2 uv = vUv;
      vec2 distortedPosition = vec2( (uv.x + (sin( uv.x * 180.0)/timex)), uv.y );
      gl_FragColor = texture2D(texture, distortedPosition);
    }

  `;

  let init = () => {
    canvas = document.querySelector('.canvas');
    scene = new THREE.Scene();
    loader = new THREE.TextureLoader();

    h = canvas.offsetHeight;
    w = canvas.offsetWidth;

    initCamera();
    initMeshes();
    initRenderer();

    resizeView();

  }

  let initCamera = () => {
    camera = new THREE.OrthographicCamera( w / -2, w / 2, h / 2, h / -2, 1, 1000 );
    camera.position.set( 0, 0, 1 );
    scene.add(camera);
  }

  let initMeshes = () => {
    const image = document.querySelector('.canvas').getAttribute('data-img');
    uniforms = {
      texture: { type: "t", value: loader.load(image) },
      timex: { type: "f", value: 400.0},
      timey: { type: "f", value: 400.0}
    };

    const material = new THREE.ShaderMaterial( {
      uniforms,
      fragmentShader,
      vertexShader
    });

    const geometry = new THREE.PlaneBufferGeometry( w, h, 1 );

    plane = new THREE.Mesh( geometry, material );
    scene.add( plane );
  }

  let initRenderer = () => {
    renderer = new THREE.WebGLRenderer({ antialiasing: true, alpha: true});
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setClearColor(0x000000, 0);
    renderer.setSize(canvas.offsetWidth, canvas.offsetHeight);
    canvas.appendChild(renderer.domElement);
  }

  let calc = () => {
    if(up == true && value < ceiling) {
      value+= increment;
      uniforms.timex.value -= 1.9;
      uniforms.timey.value -= 0.5;
      if (value >= ceiling ) {
        up = false;
      }
    } else {
      up = false;
      value -= increment;
      uniforms.timex.value += 1.9;
      uniforms.timey.value += 0.5;

      if (value <= 0) {
        up = true
      }
    }
  }

  let animate = () => {
    requestAnimationFrame( animate );
    renderer.render( scene, camera );
    calc();
  };

  let resizeView = () => {
    if (window.innerWidth >= window.innerHeight) {
      w = canvas.offsetWidth;
      h = canvas.offsetHeight;;
    } else if (window.innerWidth < window.innerHeight) {
      w = canvas.offsetWidth;
      h = canvas.offsetHeight;
    }
    camera.aspect = w/h;
    camera.updateProjectionMatrix();
    renderer.setSize(canvas.offsetWidth, canvas.offsetHeight);
  }

  window.addEventListener('resize', () => {
    resizeView();
  });

  init();
  animate();
}


export default WebGLHome;
