<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My first three.js app</title>
		<style>
			body {
                margin: 0;
                font-family: sans-serif;
            }
            #content {
                width: 100%;  /* let our container decide our size */
                height: 100%;
                display: block;
            }
            #container {
                position: relative;  /* makes this the origin of its children */
                width: 100vw;
                height: 100vh;
                overflow: hidden;
            }
            #labels {
                position: absolute;  /* let us position ourself inside the container */
                z-index: 0;          /* make a new stacking context so children don't sort with rest of page */
                left: 0;             /* make our position the top left of the container */
                top: 0;
                color: white;
            }
            #labels>div {
                position: absolute;  /* let us position them inside the container */
                left: 0;             /* make their default position the top left of the container */
                top: 0;
                cursor: pointer;     /* change the cursor to a hand when over us */
                font-size: small;
                user-select: none;   /* don't let the text get selected */
                pointer-events: none;  /* make us invisible to the pointer */
                text-shadow:         /* create a black outline */
                -1px -1px 0 #000,
                0   -1px 0 #000,
                1px -1px 0 #000,
                1px  0   0 #000,
                1px  1px 0 #000,
                0    1px 0 #000,
                -1px  1px 0 #000,
                -1px  0   0 #000;
            }
            #labels>div:hover {
                color: red;
            }
		</style>
	</head>
	<body>
        <canvas id="content"></canvas>
        <div id="labels"></div>

        
        <script src="https://r105.threejsfundamentals.org/threejs/resources/threejs/r105/three.min.js"></script>
        <script src="https://r105.threejsfundamentals.org/threejs/resources/threejs/r105/js/utils/BufferGeometryUtils.js"></script>
        <script src="https://r105.threejsfundamentals.org/threejs/resources/threejs/r105/js/controls/OrbitControls.js"></script>
        <script src="https://r105.threejsfundamentals.org/threejs/../3rdparty/dat.gui.min.js"></script>
		<script defer>
			// Our Javascript will go here.
			// const renderer = new THREE.WebGLRenderer();
			// renderer.setSize( window.innerWidth, window.innerHeight );
			// document.body.appendChild( renderer.domElement );
			// const scene = new THREE.Scene();
			// const camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 10000 );
            // let tanFOV = Math.tan(Math.PI / 180 * camera.fov / 2);
            // const controls = new THREE.OrbitControls( camera, renderer.domElement );


			// const geometry = new THREE.BoxGeometry( 1, 1, 1 );
			// const material = new THREE.MeshBasicMaterial( { color: 0xffffff } );
			// const cube = new THREE.Mesh( geometry, material );
			// scene.add( cube );
            // camera.position.z = 4;

            // const labelContainerElem = document.querySelector('#labels');
            // const elem = document.createElement('div');
            // elem.textContent = name;
            // labelContainerElem.appendChild(elem);

            // function onWindowResize(event) {
            //     camera.aspect = window.innerWidth / window.innerHeight;

            //     // adjust the FOV
            //     camera.fov =
            //         360 / Math.PI * Math.atan(tanFOV * (window.innerHeight / windowHeight));

            //     camera.updateProjectionMatrix();
            //     camera.lookAt(scene.position);

            //     renderer.setSize(window.innerWidth, window.innerHeight);
            //     renderer.render(scene, camera);
            // }
			// function animate() {
			// 	requestAnimationFrame( animate );

			// 	// cube.rotation.x += 0.01;
			// 	// cube.rotation.y += 0.01;

			// 	renderer.render( scene, camera );
			// }
            // window.addEventListener("resize", onWindowResize, false);
			// animate();
            function main() {
                const canvas = document.querySelector('#content');
                const renderer = new THREE.WebGLRenderer({canvas});

                const fov = 60;
                const aspect = 2;  // the canvas default
                const near = 0.1;
                const far = 10;
                const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
                camera.position.z = 2.5;

                const controls = new THREE.OrbitControls(camera, canvas);
                controls.enableDamping = true;
                controls.enablePan = false;
                controls.minDistance = 1.2;
                controls.maxDistance = 4;
                controls.update();

                const scene = new THREE.Scene();
                scene.background = new THREE.Color('#246');

                {
                    const loader = new THREE.TextureLoader();
                    const texture = loader.load('https://r105.threejsfundamentals.org/threejs/resources/data/world/country-outlines-4k.png', render);
                    const geometry = new THREE.SphereBufferGeometry(1, 64, 32);
                    const material = new THREE.MeshBasicMaterial({map: texture});
                    scene.add(new THREE.Mesh(geometry, material));
                }

                async function loadJSON(url) {
                    const req = await fetch(url);
                    return req.json();
                }

                let countryInfos;
                async function loadCountryData() {
                    countryInfos = await loadJSON('https://r105.threejsfundamentals.org/threejs/resources/data/world/country-info.json');  

                    const lonFudge = Math.PI * 1.5;
                    const latFudge = Math.PI;
                    // these helpers will make it easy to position the boxes
                    // We can rotate the lon helper on its Y axis to the longitude
                    const lonHelper = new THREE.Object3D();
                    // We rotate the latHelper on its X axis to the latitude
                    const latHelper = new THREE.Object3D();
                    lonHelper.add(latHelper);
                    // The position helper moves the object to the edge of the sphere
                    const positionHelper = new THREE.Object3D();
                    positionHelper.position.z = 1;
                    latHelper.add(positionHelper);

                    const labelParentElem = document.querySelector('#labels');
                    for (const countryInfo of countryInfos) {
                    const {lat, lon, min, max, name} = countryInfo;

                    // adjust the helpers to point to the latitude and longitude
                    lonHelper.rotation.y = THREE.Math.degToRad(lon) + lonFudge;
                    latHelper.rotation.x = THREE.Math.degToRad(lat) + latFudge;

                    // get the position of the lat/lon
                    positionHelper.updateWorldMatrix(true, false);
                    const position = new THREE.Vector3();
                    positionHelper.getWorldPosition(position);
                    countryInfo.position = position;

                    // compute the area for each country
                    const width = max[0] - min[0];
                    const height = max[1] - min[1];
                    const area = width * height;
                    countryInfo.area = area;

                    // add an element for each country
                    const elem = document.createElement('div');
                    elem.textContent = name;
                    labelParentElem.appendChild(elem);
                    countryInfo.elem = elem;
                    }
                    requestRenderIfNotRequested();
                }
                loadCountryData();

                const tempV = new THREE.Vector3();
                const cameraToPoint = new THREE.Vector3();
                const cameraPosition = new THREE.Vector3();
                const normalMatrix = new THREE.Matrix3();

                const settings = {
                    minArea: 20,
                    maxVisibleDot: -0.2,
                };
                const gui = new dat.GUI({width: 300});
                gui.add(settings, 'minArea', 0, 50).onChange(requestRenderIfNotRequested);
                gui.add(settings, 'maxVisibleDot', -1, 1, 0.01).onChange(requestRenderIfNotRequested);

                function updateLabels() {
                    if (!countryInfos) {
                    return;
                    }

                    const large = settings.minArea * settings.minArea;
                    // get a matrix that represents a relative orientation of the camera
                    normalMatrix.getNormalMatrix(camera.matrixWorldInverse);
                    // get the camera's position
                    camera.getWorldPosition(cameraPosition);
                    for (const countryInfo of countryInfos) {
                    const {position, elem, area} = countryInfo;
                    // large enough?
                    if (area < large) {
                        elem.style.display = 'none';
                        continue;
                    }

                    // Orient the position based on the camera's orientation.
                    // Since the sphere is at the origin and the sphere is a unit sphere
                    // this gives us a camera relative direction vector for the position.
                    tempV.copy(position);
                    tempV.applyMatrix3(normalMatrix);

                    // compute the direction to this position from the camera
                    cameraToPoint.copy(position);
                    cameraToPoint.applyMatrix4(camera.matrixWorldInverse).normalize();

                    // get the dot product of camera relative direction to this position
                    // on the globe with the direction from the camera to that point.
                    // -1 = facing directly towards the camera
                    // 0 = exactly on tangent of the sphere from the camera
                    // > 0 = facing away
                    const dot = tempV.dot(cameraToPoint);

                    // if the orientation is not facing us hide it.
                    if (dot > settings.maxVisibleDot) {
                        elem.style.display = 'none';
                        continue;
                    }

                    // restore the element to its default display style
                    elem.style.display = '';

                    // get the normalized screen coordinate of that position
                    // x and y will be in the -1 to +1 range with x = -1 being
                    // on the left and y = -1 being on the bottom
                    tempV.copy(position);
                    tempV.project(camera);

                    // convert the normalized position to CSS coordinates
                    const x = (tempV.x *  .5 + .5) * canvas.clientWidth;
                    const y = (tempV.y * -.5 + .5) * canvas.clientHeight;

                    // move the elem to that position
                    elem.style.transform = `translate(-50%, -50%) translate(${x}px,${y}px)`;

                    // set the zIndex for sorting
                    elem.style.zIndex = (-tempV.z * .5 + .5) * 100000 | 0;
                    }
                }

                function resizeRendererToDisplaySize(renderer) {
                    const canvas = renderer.domElement;
                    const width = canvas.clientWidth;
                    const height = canvas.clientHeight;
                    const needResize = canvas.width !== width || canvas.height !== height;
                    if (needResize) {
                    renderer.setSize(width, height, false);
                    }
                    return needResize;
                }

                let renderRequested = false;

                function render() {
                    renderRequested = undefined;

                    if (resizeRendererToDisplaySize(renderer)) {
                    const canvas = renderer.domElement;
                    camera.aspect = canvas.clientWidth / canvas.clientHeight;
                    camera.updateProjectionMatrix();
                    }

                    controls.update();

                    updateLabels();

                    renderer.render(scene, camera);
                }
                render();

                function requestRenderIfNotRequested() {
                    if (!renderRequested) {
                    renderRequested = true;
                    requestAnimationFrame(render);
                    }
                }

                controls.addEventListener('change', requestRenderIfNotRequested);
                window.addEventListener('resize', requestRenderIfNotRequested);
                }

                main();
		</script>
	</body>
</html>