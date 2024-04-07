function InputForm({
  name,
  type = "text",
  title,
  register,
  errors,
  rules,
  readOnly,
  defaultValue,
}) {
  return (
    <>
      <div className="relative z-0 w-full my-3">
        <input
          type={type}
          id={name}
          className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
          placeholder=""
          defaultValue={defaultValue}
          readOnly={readOnly}
          {...register(name, rules)}
        />
        <label
          htmlFor={name}
          className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
        >
          {`${title} *`}
        </label>
        {errors && (
          <p className="mt-2 text-sm text-red-600 dark:text-red-500">
            <span className="font-medium">Ups! {errors.message}</span>
          </p>
        )}
      </div>
    </>
  );
}

export default InputForm;
