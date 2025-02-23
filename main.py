class Mascota:
    def __init__(self, nombre, energia, hambre, sueño):
        self.nombre = nombre
        self.energia = energia
        self.hambre = hambre
        self.sueño = sueño

    def set_energia(self, energia):
        self.energia = energia

    def set_hambre(self, hambre):
        self.hambre = hambre

    def set_sueño(self, sueño):
        self.sueño = sueño

    def get_nombre(self):
        return self.nombre

    def get_energia(self):
        return self.energia

    def get_hambre(self):
        return self.hambre

    def get_sueño(self):
        return self.sueño


# Constantes
JUGAR = 10
DORMIR = 10
LEER = 10
COMER = 10


def jugar(mascota):
    mascota.set_energia(mascota.get_energia() - JUGAR)
    mascota.set_sueño(mascota.get_sueño() + JUGAR)
    mascota.set_hambre(mascota.get_hambre() + JUGAR)
    print(f"{mascota.get_nombre()} acaba de jugar!")


def leer(mascota):
    mascota.set_energia(mascota.get_energia() - LEER)
    mascota.set_sueño(mascota.get_sueño() + LEER)
    mascota.set_hambre(mascota.get_hambre() + LEER)
    print(f"{mascota.get_nombre()} acaba de leer!")


def comer(mascota):
    if mascota.get_energia() < 100:
        mascota.set_energia(mascota.get_energia() + COMER)
    mascota.set_sueño(mascota.get_sueño() + COMER)
    mascota.set_hambre(mascota.get_hambre() - COMER)
    print(f"{mascota.get_nombre()} acaba de comer!")


def dormir(mascota):
    if mascota.get_energia() < 100:
        mascota.set_energia(mascota.get_energia() + DORMIR)
    mascota.set_sueño(0)
    mascota.set_hambre(mascota.get_hambre() + DORMIR)
    print(f"{mascota.get_nombre()} acaba de dormir!")


def mostrar_estado(mascota):
    print("---------------------------------------")
    print("Estado de la mascota:")
    print(f"Nombre: {mascota.get_nombre()}")
    print(f"Energía: {mascota.get_energia()}")
    print(f"Hambre: {mascota.get_hambre()}")
    print(f"Sueño: {mascota.get_sueño()}")
    print("---------------------------------------")


def main():
    print("Ingresar el nombre: ")
    nombre = input().strip()
    mascota = Mascota(nombre, 100, 0, 0)
    exit_game = False

    while not exit_game:
        print("Seleccione la opción:")

        menu = "1 - Jugar\n"
        menu += "2 - Leer\n"
        menu += "3 - Comer\n"
        menu += "4 - Dormir\n"
        menu += "5 - Estado de la mascota\n"
        menu += "0 - Salir\n"

        print(menu)

        opcion_menu = int(input().strip())

        if mascota.get_energia() == 0:
            print("---------------------------------------")
            print(f"{mascota.get_nombre()} se acaba de morir")
            print("---------------------------------------")
            exit_game = True

        if mascota.get_sueño() == 100:
            print("---------------------------------------")
            print(f"{mascota.get_nombre()} se acaba de morir")
            print("---------------------------------------")
            exit_game = True

        if mascota.get_hambre() == 100:
            print("---------------------------------------")
            print(f"{mascota.get_nombre()} se acaba de morir")
            print("---------------------------------------")
            exit_game = True

        if mascota.get_hambre() == 70:
            print("---------------------------------------")
            print(f"{mascota.get_nombre()} tiene mucha hambre!")
            print("---------------------------------------")

        if mascota.get_sueño() == 70:
            print("---------------------------------------")
            print(f"{mascota.get_nombre()} tiene mucho sueño!")
            print("---------------------------------------")

        if not exit_game:
            if 0 <= opcion_menu <= 5:
                if opcion_menu == 0:
                    print("---------------------------------------")
                    exit_game = True
                    print("Acabas de salir del juego")
                    print("---------------------------------------")
                elif opcion_menu == 1:
                    print("---------------------------------------")
                    if mascota.get_energia() > 10:
                        jugar(mascota)
                    else:
                        print(f"{mascota.get_nombre()} no tiene energía suficiente!")
                    print("---------------------------------------")
                elif opcion_menu == 2:
                    print("---------------------------------------")
                    if mascota.get_energia() > 10:
                        leer(mascota)
                    else:
                        print(f"{mascota.get_nombre()} no tiene energía suficiente!")
                    print("---------------------------------------")
                elif opcion_menu == 3:
                    print("---------------------------------------")
                    if mascota.get_hambre() > 0:
                        comer(mascota)
                    else:
                        print(f"{mascota.get_nombre()} no tiene hambre!")
                    print("---------------------------------------")
                elif opcion_menu == 4:
                    print("---------------------------------------")
                    if mascota.get_sueño() > 0:
                        dormir(mascota)
                    print("---------------------------------------")
                elif opcion_menu == 5:
                    mostrar_estado(mascota)
            else:
                print("Seleccione una opción válida")


if __name__ == "__main__":
    main()