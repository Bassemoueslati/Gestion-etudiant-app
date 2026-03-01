# Gestion Etudiant

Laravel API for student management.

## API Endpoints

### Etudiants
- `GET /api/etudiants` - List all students
- `POST /api/etudiants` - Create student
- `GET /api/etudiants/{id}` - Get student
- `PUT /api/etudiants/{id}` - Update student
- `DELETE /api/etudiants/{id}` - Delete student

### Classes
- `GET /api/classes` - List all classes
- `POST /api/classes` - Create class
- `GET /api/classes/{id}` - Get class
- `PUT /api/classes/{id}` - Update class
- `DELETE /api/classes/{id}` - Delete class

## Docker

```
bash
docker-compose up -d
```

## Kubernetes

```
bash
kubectl apply -f k8s/
