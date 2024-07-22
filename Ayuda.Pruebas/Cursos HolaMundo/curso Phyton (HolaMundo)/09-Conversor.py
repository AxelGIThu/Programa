temperatura = float(input("Ingrese la temperatura a convertir: "))
escala = input("La temperatura ingresada esta en Farenheit(F) o Celcius(C)?  (Se convertira al contrario)").lower()

if escala == "c":
    print((temperatura * 9/5) + 32) # Devuelve el resultado de la operación
elif escala == "f":
    print((temperatura - 32) * 5/9)
else:
    print("Escala incorrecta")