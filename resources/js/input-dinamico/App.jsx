import React from "react";
import { useFieldArray, useForm } from "react-hook-form";

function App() {
  const Element = document.getElementById("main");
  const routeStore = Element.getAttribute("data-route");
  const crf = Element.getAttribute("data-csrf");

  const { register, control, handleSubmit } = useForm({
    defaultValues: {
      items: [
        { name: "item1", quantity: 1 },
        { name: "item2", quantity: 2 },
      ],
    },
  });

  const { fields, append, remove } = useFieldArray({
    control,
    name: "items",
  });

  console.log(fields);

  const onSubmit = (data, e) => {
    console.log(data);
    console.log(e.target.value)
    // e.target.submit();
  };
  return (
    <>
      <form
        action={routeStore}
        method="POST"
        className="mt-48"
        onSubmit={handleSubmit(onSubmit)}
      >
        <input type="hidden" name="_token" value={crf} />
        {fields.map((field, index) => {
          return (
            <div key={field.id}>
              <input
                type="text"
                className="bg-slate-600"
                {...register(`items.${index}.name`)}
                defaultValue={field.name}
              />
              <input
                type="text"
                className="bg-slate-600"
                {...register(`items.${index}.quantity`)}
                defaultValue={field.quantity}
              />

              <button type="button" onClick={() => remove(index)}>
                Remove
              </button>
            </div>
          );
        })}
        <button type="button" onClick={() => append({ name: "", quantity: 0 })}>
          Add item
        </button>
        <button type="submit">Submit</button>
      </form>
    </>
  );
}

export default App;
