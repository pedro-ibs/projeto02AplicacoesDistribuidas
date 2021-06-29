package br.edu.livros.acervo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.edu.livros.acervo.data.vo.CategoryVO;
import br.edu.livros.acervo.services.CategoryServices;

@RestController
@RequestMapping("/Category")
public class CategoryController {	
	
	@Autowired
	private CategoryServices services;
	
	@GetMapping
	public List<CategoryVO> findAll() {
		return services.findAll();
	}
	
	@GetMapping("/{id}")
	public CategoryVO findById(@PathVariable("id") Long id) {
		return services.findById(id);
	}
	
	@PostMapping
	public CategoryVO create(@RequestBody CategoryVO person) {
		return services.create(person);
	}
	
	@PutMapping
	public CategoryVO update(@RequestBody CategoryVO person) {
		return services.update(person);
	}
	
	@DeleteMapping("/{id}")
	public ResponseEntity<?> delete(@PathVariable("id") Long id) {
		services.delete(id);
		return ResponseEntity.ok().build(); 
	}
}