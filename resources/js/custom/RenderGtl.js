import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader";
import { useFilters } from "./hooks/useFilters";

const divDisennador = document.getElementById("disennador");
const ancho = divDisennador.clientWidth;
const alto = divDisennador.clientHeight;
// Crear escena
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
  15,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);

camera.position.set(10, 10, 10);
camera.lookAt(0, 0, 0);

const renderer = new THREE.WebGLRenderer({
  alpha: true,
  antialias: true,
});

renderer.setSize(ancho, alto);

divDisennador.appendChild(renderer.domElement);

divDisennador.addEventListener("resize", () => {
  const ancho = divDisennador.clientWidth;
  const alto = divDisennador.clientHeight;
  renderer.setSize(ancho, alto);
  camera.aspect = ancho / alto;
  camera.updateProjectionMatrix();
});

// Luz ambiental
const ambient_light = new THREE.AmbientLight("#FFF", 0.5);
scene.add(ambient_light);

// Punto de luz
const light = new THREE.PointLight("#FFF", 1, 100);
light.position.set(15, 15, 15);
scene.add(light);

// Permite mover la camara al rededor de un objeto
const controls = new OrbitControls(camera, renderer.domElement);

// Carga de modelo en formato GLB
const loader = new GLTFLoader();

/**
 * functionality of custom donuts
 */

const inputGlazed = document.getElementById("glazed");
const inputTopping = document.getElementById("topping");

const { getGlazed, getToppings } = useFilters();

const Glazed = getGlazed(rawMaterials);
const Toppings = getToppings(rawMaterials);

let RECIPE = [
  {
    glazed: {
      id: 0,
      name: "Sin elegir",
      sale_price: 0.0,
      model: null,
    },
    topping: {
      id: 0,
      name: "Sin elegir",
      sale_price: 0.0,
      model: null,
    },
    totalPrice: 0.0,
    model: "dona",
  },
];

const btnGlazed = document.getElementById("btnGlazed");
const btnTopping = document.getElementById("btnTopping");

btnGlazed.addEventListener("click", () => {
  btnGlazed.classList.add("bg-gray-200");
  btnGlazed.classList.add("dark:bg-gray-700");
  btnTopping.classList.remove("bg-gray-200");
  btnTopping.classList.remove("dark:bg-gray-700");

  renderButtons(Glazed, "glazed");
});

btnTopping.addEventListener("click", () => {
  btnTopping.classList.add("bg-gray-200");
  btnTopping.classList.add("dark:bg-gray-700");
  btnGlazed.classList.remove("bg-gray-200");
  btnGlazed.classList.remove("dark:bg-gray-700");

  renderButtons(Toppings, "topping");
});

// function to update recipe

function updateRecipe(recipeUpdated) {
  RECIPE = recipeUpdated;

  loader.load(
    `../modelos/${RECIPE[0].model}.gltf`,
    (gltf) => {
      scene.clear();
      const model = gltf.scene;
      scene.add(model);
      const animate = () => {
        requestAnimationFrame(animate);
        renderer.render(scene, camera);
        // Rotar modelo
        model.rotation.y += 0.01;
      };
      animate();
    },
    undefined,
    (error) => {
      console.error(error);
    }
  );

  const DIV = document.getElementById("recipe");

  const html = RECIPE.map(
    (recipe) => `
    <p class="font-bold"><span class="text-xl dark:text-slate-300">Glaseado:</span> ${
      recipe.glazed.name
    }${
      recipe.glazed.sale_price != 0 ? " - " + recipe.glazed.sale_price : ""
    }</p>
    <p class="font-bold"><span class="text-xl dark:text-slate-300">Topping:</span> ${
      recipe.topping.name
    }${
      recipe.topping.sale_price != 0
        ? " - " + recipe.topping.sale_price
        : ""
    }</p>
    <div class="py-3">
    <p class="font-bold"><span class="text-2xl dark:text-slate-300">Total: </span><span class="text-xl">${
      recipe.totalPrice
    } bs</span></p>
    </div>`
  );

  DIV.innerHTML = html;

  inputGlazed.value = RECIPE[0].glazed.id;
  inputTopping.value = RECIPE[0].topping.id;
}

updateRecipe(RECIPE);

// function to create and render buttons

function renderButtons(rawMaterials, type) {
  const HTML = rawMaterials.map(
    (raw) => `
    <div class="flex justify-center items-center flex-col">
    <div class="relative flex flex-col items-center group">
        <button key="${raw.id}" class="btn-dona w-7 h-7 bg-red-300 rounded-full transition-colors duration-200 focus:outline-none" type="button" value="${raw.model}"></button>
        <p class="text-center truncate">${raw.name.slice(0, 14) + "..."}</p>

        <p
          class="absolute border border-gray-600 flex flex-col items-center justify-center w-48 p-3 group-hover:opacity-100 transition-opacity text-gray-600 -translate-x-1/2 translate-y-full opacity-0 bg-white rounded-lg shadow-lg -top-28 left-1/2 -bottom-5 dark:shadow-none shadow-gray-200 dark:bg-gray-900 dark:text-white">
          <span class="text-center">${raw.name}</span>
          <span class="text-green-600">Disponible</span>
          <span class=" ">Precio: ${raw.sale_price}</span>

          <svg xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6 absolute rotate-45 -translate-x-1/2 left-1/2 -top-3 -mb-3 transform text-white dark:text-gray-900 fill-current border-t border-l border-gray-600"
            stroke="currentColor" viewBox="0 0 24 24">
            <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"></path>
          </svg>
        </p>
      </div>
    </div>`
  );

  const buttonsContainer = document.querySelector("#buttonsContainer");
  buttonsContainer.innerHTML = HTML.join("");

  const btns = document.querySelectorAll(".btn-dona");

  btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      let ingredient = rawMaterials.filter(
        (ingr) => ingr.id == btn.getAttribute("key")
      );
      let ing = { ...ingredient[0] };

      if (type == "glazed") {
        RECIPE[0].glazed = ing;
        RECIPE[0].totalPrice = (
          parseFloat(RECIPE[0].glazed.sale_price) +
          parseFloat(RECIPE[0].topping.sale_price)
        ).toFixed(2);
        RECIPE[0].model =
          RECIPE[0].topping.model == null
            ? RECIPE[0].glazed.model
            : `${RECIPE[0].glazed.model}$${RECIPE[0].topping.model}`;
      } else {
        RECIPE[0].topping = ing;
        RECIPE[0].totalPrice = (
          parseFloat(RECIPE[0].glazed.sale_price) +
          parseFloat(RECIPE[0].topping.sale_price)
        ).toFixed(2);
        RECIPE[0].model =
          RECIPE[0].glazed.model == null
            ? RECIPE[0].topping.model
            : `${RECIPE[0].glazed.model}$${RECIPE[0].topping.model}`;
      }
      updateRecipe(RECIPE);
    });
  });
}
