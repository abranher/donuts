import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

let inputs = [
  "css/app.css",
  "js/app.js",
  "js/auth/sign-up/sign-up.js",
  "js/auth/sign-up/sign-in.js",
  "js/auth/user-unlock/user-unlock.js",
  "js/notifications/notifications.js",
  "js/custom/RenderGtl.js",
  "js/shop/shop.js",
  "js/admin/delivery-men/create.js",
  "js/admin/delivery-men/edit.js",
  "js/inventory/cat-pro/create-cat-pro.js",
  "js/inventory/cat-pro/edit-cat-pro.js",
  "js/inventory/inv-pro/create-product.js",
  "js/inventory/inv-pro/edit-product.js",
  "js/promotions/calendar.js",
  "js/promotions/create-promotions.js",
  "js/promotions/edit-promotions.js",
  "js/coupons/create-coupons.js",
  "js/coupons/edit-coupons.js",
  "js/advertisements/create-advertisements.js",
  "js/maps/Geolocation.js",
  "js/maps/admin/deliveries/deliveries.js",
].map((item) => "resources/".concat(item));

export default defineConfig({
  plugins: [
    laravel({
      input: inputs,
      refresh: true,
    }),
    react(),
  ],
});
