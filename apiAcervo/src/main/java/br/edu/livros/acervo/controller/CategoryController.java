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

import br.edu.livros.acervo.data.vo.v1.CategoryVO;
import br.edu.livros.acervo.services.CategoryServices;

import static org.springframework.hateoas.server.mvc.WebMvcLinkBuilder.methodOn;
import static org.springframework.hateoas.server.mvc.WebMvcLinkBuilder.linkTo;


@RestController
@RequestMapping("/api/category/v1")
public class CategoryController {	
	
	@Autowired
	private CategoryServices services;
	
	@GetMapping(produces = {"application/json", "application/xml", "application/x-yaml"})
	public List<CategoryVO> findAll() {
		List<CategoryVO> persons = services.findAll();
		persons.stream().forEach(p -> p.add( linkTo( methodOn( CategoryController.class ).findById(p.getKey())).withSelfRel() ));
		return persons;
	}
	
	@GetMapping(value = "/{id}", produces = {"application/json", "application/xml", "application/x-yaml"} )
	public CategoryVO findById(@PathVariable("id") Long id) {
		CategoryVO categoryVO  = services.findById(id);
		categoryVO.add( linkTo( methodOn( CategoryController.class ).findById(id)).withSelfRel() );
		return categoryVO;
	}
	
	@PostMapping(produces = {"application/json", "application/xml", "application/x-yaml"}, consumes = {"application/json", "application/xml", "application/x-yaml"} )
	public CategoryVO create(@RequestBody CategoryVO category) {
		CategoryVO categoryVO  = services.create(category);
		categoryVO.add( linkTo( methodOn( CategoryController.class ).findById(category.getKey())).withSelfRel() );
		return categoryVO;
	}
	
	@PutMapping(produces = {"application/json", "application/xml", "application/x-yaml"}, consumes = {"application/json", "application/xml", "application/x-yaml"})
	public CategoryVO update(@RequestBody CategoryVO category) {
		CategoryVO categoryVO  = services.update(category);
		categoryVO.add( linkTo( methodOn( CategoryController.class ).findById(category.getKey())).withSelfRel() );
		return categoryVO;
	}
	
	@DeleteMapping("/{id}")
	public ResponseEntity<?> delete(@PathVariable("id") Long id) {
		services.delete(id);
		return ResponseEntity.ok().build(); 
	}
}