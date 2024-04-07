export const generateCode = () => {
  // Generamos una cadena de caracteres aleatoria de 8 caracteres
  const caracteres =
    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#@$&";
  let codigo = caracteres.charAt(Math.floor(Math.random() * caracteres.length));

  // Recorremos la cadena de caracteres aleatoriamente hasta completar 8 caracteres
  for (let i = 1; i < 10; i++) {
    codigo += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
  }

  // Devolvemos el código generado
  return codigo;
};
