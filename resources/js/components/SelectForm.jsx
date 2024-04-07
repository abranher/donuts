function SelectForm({
  name,
  withLabel = false,
  title,
  register,
  errors,
  size = "w-full",
  rules,
  defaultValue,
  optionDefault = true,
  data,
  arrayData = false,
}) {
  return (
    <>
      <div className={`relative z-0 ${size} my-3`}>
        {withLabel && (
          <label
            htmlFor={name}
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >
            {`${title} *`}
          </label>
        )}
        <select
          id={name}
          defaultValue={defaultValue}
          className={`w-full px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white focus:outline-none`}
          {...register(name, rules)}
        >
          {optionDefault && <option value="">--Seleccionar--</option>}
          {arrayData == false
            ? data.map((item) => (
                <option key={item.id} value={item.id}>
                  {item.name || item.title}
                </option>
              ))
            : data.map((item) => (
                <option key={item} value={item}>
                  {item}
                </option>
              ))}
        </select>
        {errors && (
          <p className="mt-2 text-sm text-red-600 dark:text-red-500">
            <span className="font-medium">Ups! {errors.message}</span>
          </p>
        )}
      </div>
    </>
  );
}

export default SelectForm;
