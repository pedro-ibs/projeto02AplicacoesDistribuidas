package br.edu.livros.acervo.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import br.edu.livros.acervo.data.model.Category;

@Repository //org.springframework.stereotype
public interface Categorypository extends JpaRepository<Category, Long>{

}
