import Alpine from "alpinejs";
import StockProducts from "./alpine/inventory/stocks-products/StockProducts";
import StockRawMaterial from "./alpine/inventory/stocks-raw-materials/StockRawMaterial";
import ConfirmOperation from "./alpine/invoice-orders/ConfirmOperation";

Alpine.data("stockRawMaterial", StockRawMaterial);

Alpine.data("stockProducts", StockProducts);

Alpine.data("VerifyOrder", ConfirmOperation);
Alpine.data("assignDeliveryMan", ConfirmOperation);
Alpine.data("changeDeliveryMan", ConfirmOperation);

Alpine.start();
