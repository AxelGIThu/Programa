lenguajes = ["Python", "Ruby", "PHP", "Javascrip", "Java"]
lenguajes.insert(3, "Go") # añade un elemento y corre todos los siguientes a la derecha
lenguajes.insert(0, "C")
lenguajes.remove("Ruby") # Borra un elemento
print("PHP" in lenguajes) # in verifica que este dentro de la lista

print(len(lenguajes))

print(lenguajes)