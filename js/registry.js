import { addInput, addTableName, enableValidation } from "./script-functions.js?v=1";

export function runComponentRegistry() {
  const path = window.location.pathname;
  const pageName = path.substring(path.lastIndexOf("/") + 1);

  switch (pageName) {
    case "tb-config.php":
      window.addInput = addInput;
      window.addTableName = addTableName;
      break;
    case "db-config.php":
      enableValidation();
      break;
    default:
      break;
  }
}
