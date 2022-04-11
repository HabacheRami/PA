# Version minimum de cmake
cmake_minimum_required(VERSION 3.20)
project(Projet_C_S1 C)
set(CMAKE_C_STANDARD 99)
set(CMAKE_C_FLAGS "-Wall")

#Chemin a changer pour que les bibliothèque fonctionnent


# Pour curl
include_directories("C:/Users/luc7p/CLionProjects/ProjetPA/Lib/curl-7.80.0-win64-mingw/include/curl")
link_directories("C:/Users/luc7p/CLionProjects/ProjetPA/Lib/curl-7.80.0-win64-mingw/lib")
link_libraries(libcurl)

# Pour SQL
include_directories("C:/Users/luc7p/CLionProjects/ProjetPA/Lib/mysql/include")
link_directories("C:/Users/luc7p/CLionProjects/ProjetPA/Lib/mysql/lib")
link_libraries(libmysql)



add_executable(Projet_C_S1 main.c)