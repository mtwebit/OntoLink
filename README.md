# OntoLink
OntoLink module for ProcessWire (proof of concept).

## Purpose
This module creates automatic references between field content and pages.  

## How does it work
### Creating an ontology
The ontology is an index of terms. Terms may have fields and relations to other terms.  
The current version of the module only uses two fields for terms:  
* "title" (FieldtypeText) - stores the name of the term (e.g. a person's full name).  
* "known_as" (FieldtypeTextArea) - contains variations of the term (e.g. nicknames, etc.).  

### Creating references to the ontology
While editing a page the user can mark text portions with { and } in text fields.
When saving the page these marked texts will be automatically linked to the proper ontology entry based on title / known_as matching rules (see the source for details). If a match is found the {term} text is replaced with {term|ID} where the ID is the ProcessWire page id of the given term record.

### Displaying references
While displaying a page the {term|ID} marks are converted into hyperlinks to the appropriate ontology entry.

## Configuration
The module's config display allows the selection of the content type for the ontology and the set of fields that will be checked while saving the page and converted to links during page display.

## Example
See http://dh.mit.bme.hu/frhu/

## Future plans
* Instead of inserting a link show a small popup window with a term summary
* Collect the links and use them as backreferences from the ontology to the content.
* Use ontology relations to link the content to other entries.
* Provide refined search based on the references and relations: use keyword extension based on the ontology.
* Import knowledge to the ontology based on external references (e.g. VIAF ID for persons).
* ...
